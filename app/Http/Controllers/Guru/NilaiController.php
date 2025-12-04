<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        // Ambil semua jadwal 
        $jadwals = Auth::user()->jadwals()->orderBy('hari')->orderBy('waktu_mulai')->get();

        return view('guru.nilai.index', compact('jadwals'));
    }

    /** Tampilkan form input nilai untuk jadwal tertentu. */
    public function showFormInput(Jadwal $jadwal)
    {
        if ($jadwal->user_id !== Auth::id()) { abort(403); }

        // Ambil semua siswa yang masuk kelas jadwal ini
        $siswas = Siswa::where('kelas', $jadwal->kelas)->orderBy('nama_siswa')->get();
        
        // Ambil nilai yang sudah ada untuk jadwal ini, dikelompokkan berdasarkan siswa
        $nilaiTersimpan = $jadwal->nilais()->pluck('rata_rata', 'siswa_id');

        $jenisNilai = ['Pekan 1', ' Pekan 2', 'Pekan 3', 'Pekan 4'];
        $dataNilai = $jadwal->nilais()->get()->keyBy('siswa_id');

        return view('guru.nilai.input', compact('jadwal', 'siswas', 'nilaiTersimpan', 'dataNilai'));
    }

    public function store(Request $request, Jadwal $jadwal)
    {
        // Pastikan guru yang login adalah pemilik jadwal
        if ($jadwal->user_id !== Auth::id()) {
            abort(403);
        }

        // Validasi input
        $request->validate([
            'pekan' => 'required|array',
            'pekan.*.pekan_1' => 'nullable|integer|min:0|max:100',
            'pekan.*.pekan_2' => 'nullable|integer|min:0|max:100',
            'pekan.*.pekan_3' => 'nullable|integer|min:0|max:100',
            'pekan.*.pekan_4' => 'nullable|integer|min:0|max:100',
        ]);

        foreach ($request->pekan as $siswaId => $dataPekan) {
            // Ambil nilai yang ada dan hitung rata-rata
            $nilaiArray = collect([
                $dataPekan['pekan_1'] ?? null,
                $dataPekan['pekan_2'] ?? null,
                $dataPekan['pekan_3'] ?? null,
                $dataPekan['pekan_4'] ?? null,
            ])->filter(fn($v) => $v !== null);

            $rataRata = $nilaiArray->count() ? round($nilaiArray->avg(), 2) : null;

            // Simpan atau update nilai
            Nilai::updateOrCreate(
                [
                    'siswa_id' => $siswaId,
                    'jadwal_id' => $jadwal->id,
                ],
                [
                    'pekan_1'   => $dataPekan['pekan_1'] ?? null,
                    'pekan_2'   => $dataPekan['pekan_2'] ?? null,
                    'pekan_3'   => $dataPekan['pekan_3'] ?? null,
                    'pekan_4'   => $dataPekan['pekan_4'] ?? null,
                    'rata_rata' => $rataRata,
                    'mata_pelajaran'=> $jadwal->mata_pelajaran,
                    'user_id'   => Auth::id(), 
                ]
            );
        }

        return redirect()
            ->route('guru.nilai.index')
            ->with('success', 'Nilai perkembangan untuk kelas ' . $jadwal->kelas . ' berhasil diperbarui!');
    }


}