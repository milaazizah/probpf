<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Siswa;
use App\Models\Kehadiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KehadiranController extends Controller
{

    public function index(Request $request)
    {
        // Ambil daftar unik kelas yang diajar oleh Guru yang login
        $kelasDiajar = Auth::user()->jadwals()->pluck('kelas')->unique()->sort();
        $selectedKelas = $request->get('kelas_filter');
        $filterDate = $request->get('tanggal_filter');

        // Ambil jadwal hari ini (untuk input real-time)
        $dayName = now()->locale('id')->isoFormat('dddd'); 
        $jadwalHariIni = Auth::user()->jadwals()
            ->where('hari', $dayName)
            ->orderBy('waktu_mulai')
            ->get();

        $riwayatKehadiran = collect(); 
        $showRiwayat = false; // Flag untuk menampilkan tabel riwayat

        if ($selectedKelas) {
            $showRiwayat = true;
            
            $query = Kehadiran::with(['siswa', 'jadwal'])
                ->whereHas('jadwal', function ($q) use ($selectedKelas) {
                    // Filter riwayat berdasarkan kelas yang dipilih DAN guru yang login
                    $q->where('user_id', Auth::id())
                    ->where('kelas', $selectedKelas);
                })
                ->orderBy('tanggal', 'desc')
                ->orderBy('created_at', 'desc');

            if ($filterDate) {
                // Filter berdasarkan tanggal spesifik
                $query->whereDate('tanggal', $filterDate);
            } else {
                // Default: 30 hari terakhir untuk kelas yang dipilih
                $query->where('tanggal', '>=', now()->subDays(30)->format('Y-m-d'));
            }

            $riwayatKehadiran = $query->paginate(15)->appends($request->except('page'));
        }

        return view('guru.kehadiran.index', compact(
            'jadwalHariIni', 
            'dayName', 
            'riwayatKehadiran', 
            'filterDate', 
            'kelasDiajar', 
            'selectedKelas',
            'showRiwayat'
        ));
    }

    /** Tampilkan form absen untuk jadwal tertentu. */
    public function showFormAbsensi(Jadwal $jadwal)
    {
        if ($jadwal->user_id !== Auth::id()) { abort(403); }

        $tanggal = now()->format('Y-m-d');
        $siswas = Siswa::where('kelas', $jadwal->kelas)->orderBy('nama_siswa')->get();
        
        $kehadiranTersimpan = Kehadiran::where('jadwal_id', $jadwal->id)
            ->where('tanggal', $tanggal)
            ->pluck('status', 'siswa_id')
            ->toArray();

        return view('guru.kehadiran.absensi', compact('jadwal', 'tanggal', 'siswas', 'kehadiranTersimpan'));
    }

    /** Proses penyimpanan absensi. */
    public function store(Request $request, Jadwal $jadwal)
    {
        if ($jadwal->user_id !== Auth::id()) { abort(403); }

        $request->validate([
            'tanggal' => 'required|date_format:Y-m-d',
            'status' => 'required|array',
            'status.*' => 'required|in:Hadir,Izin,Alpha,Sakit',
            'keterangan' => 'nullable|array',
            'keterangan.*' => 'nullable|string|max:255',
        ]);
        
        $tanggal = $request->tanggal;
        $siswas = Siswa::where('kelas', $jadwal->kelas)->pluck('id')->toArray();
        
        foreach ($siswas as $siswaId) {
         
            Kehadiran::updateOrCreate(
                [
                    'siswa_id' => $siswaId,
                    'jadwal_id' => $jadwal->id,
                    'tanggal' => $tanggal,
                ],
                [
                    'status' => $request->status[$siswaId] ?? 'Alpha',
                    'keterangan' => $request->keterangan[$siswaId] ?? null,
                ]
            );
        }

        return redirect()->route('guru.kehadiran.index')->with('success', 'Absensi untuk jadwal ' . $jadwal->mata_pelajaran . ' berhasil disimpan!');
    }
}