<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Materi;
use App\Models\Nilai;
use App\Models\Kehadiran;
use App\Models\Siswa;

class DashboardSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
    
        // Ambil data Siswa melalui relasi dari User yang login
        $siswa = $user->siswa; // Memanggil relasi hasOne(Siswa::class) dari User model

        if (!$siswa) {
            // Jika user login sebagai siswa tetapi data siswa tidak ditemukan
            Auth::logout();
            return redirect('/login')->withErrors('Data siswa tidak ditemukan.');
        }
        
        $kelasSiswa = $siswa->kelas;
        $materis = Materi::where('kelas', $kelasSiswa)
                            ->orderBy('created_at', 'desc')
                            ->take(5) // Ambil 5 materi terbaru untuk dashboard
                            ->get();

        // 2. Nilai Perkembangan
        $nilaiRataRata = $siswa->nilais()->avg('rata_rata');
        $nilaiLengkap = $siswa->nilais()->with('jadwal')->get();

        // 3. Riwayat Kehadiran (Statistik Cepat)
        $kehadiranStats = Kehadiran::where('siswa_id', $siswa->id)
                                    ->get()
                                    ->groupBy('status');
                                    
        $totalSesi = $kehadiranStats->flatten()->count();
        
        $persenHadir = $totalSesi > 0 ? round(($kehadiranStats['Hadir'] ?? collect())->count() / $totalSesi * 100, 1) : 0;
        
        return view('siswa.dashboard', compact(
            'siswa',
            'kelasSiswa',
            'materis',
            'nilaiRataRata',
            'nilaiLengkap',
            'persenHadir',
            'totalSesi',
            'kehadiranStats'
        ));
    
    }

    public function materiDetail()
    {
        $user = Auth::user();
        $siswa = $user->siswa;
        $kelasSiswa = $siswa->kelas;
        
        // Ambil SEMUA materi untuk kelas ini
        $materis = Materi::where('kelas', $kelasSiswa)
                            ->orderBy('created_at', 'desc')
                            ->get();
                            
        return view('siswa.materi_detail', compact('siswa', 'materis'));
    }

    public function showMateri($id)
{
    $user = Auth::user();
    $siswa = $user->siswa;
    
    // Cari materi berdasarkan ID
    $materi = Materi::findOrFail($id);
    
    // PENTING: Periksa apakah materi ini sesuai dengan kelas siswa
    if ($materi->kelas !== $siswa->kelas) {
        // Ini adalah langkah keamanan untuk mencegah siswa melihat materi kelas lain
        abort(403, 'Akses Dibatasi. Materi ini bukan untuk kelas Anda.');
    }

    return view('siswa.materi_show', compact('siswa', 'materi'));
}


// ********* METHOD DETAIL NILAI SISWA *********
    public function nilaiDetail()
    {
        $user = Auth::user();
        $siswa = $user->siswa;
        
        // Ambil SEMUA nilai siswa dengan detail jadwal
        $nilaiLengkap = $siswa->nilais()->with('jadwal')->orderByDesc('updated_at')->get();
                            
        return view('siswa.nilai_detail', compact('siswa', 'nilaiLengkap'));
    }

// ********* METHOD DETAIL KEHADIRAN SISWA *********
    public function kehadiranDetail()
    {
        $user = Auth::user();
        $siswa = $user->siswa;
        
        // Ambil SEMUA riwayat kehadiran siswa
        $riwayatKehadiran = $siswa->kehadirans()->with('jadwal')->orderByDesc('tanggal')->get();
                            
        return view('siswa.kehadiran_detail', compact('siswa', 'riwayatKehadiran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
