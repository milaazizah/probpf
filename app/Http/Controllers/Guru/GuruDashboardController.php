<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Jadwal;
use App\Models\Materi;
use App\Models\Nilai;
use App\Models\Kehadiran;

class GuruDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = now();
        
        // 1. Data Utama 
        $totalKelasDiajar = Jadwal::where('user_id', $user->id)->count();

        $totalMateri = Materi::where('user_id', $user->id)->count();
        // 2. Jadwal Hari Ini (Aksi Cepat Kehadiran)
        $dayName = $today->locale('id')->isoFormat('dddd'); 
        $jadwalHariIni = $user->jadwals()
            ->where('hari', $dayName)
            ->orderBy('waktu_mulai')
            ->get();
            
        // 3. Status Nilai & Rata-Rata
        $allNilai = $user->jadwals()
            ->with('nilais:id,jadwal_id,rata_rata')
            ->get()
            ->pluck('nilais')
            ->flatten()
            ->pluck('rata_rata')
            ->filter();
            
        $rataRataNilaiUmum = $allNilai->avg();
        
        // Cek input nilai yang paling tertinggal
        $jadwalPerluInputNilai = [];
        $jadwalIds = $user->jadwals->pluck('id');
        
        foreach ($user->jadwals as $jadwal) {
            // Cari nilai yang rata-ratanya masih null/kosong
            $nilaiKosong = $jadwal->nilais()->whereNull('rata_rata')->exists();
            
            if ($nilaiKosong || $jadwal->nilais->isEmpty()) {
                $jadwalPerluInputNilai[] = $jadwal;
            }
        }
        
        // 5. Statistik Kehadiran (30 hari terakhir)
        $dataKehadiran = Kehadiran::whereHas('jadwal', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->where('tanggal', '>=', $today->subDays(30)->format('Y-m-d'))
            ->get()
            ->groupBy('status');
            
        $totalAbsensi = $dataKehadiran->flatten()->count();
        
        $kehadiranStats = [
            'Hadir' => $totalAbsensi > 0 ? round(($dataKehadiran['Hadir'] ?? collect())->count() / $totalAbsensi * 100, 1) : 0,
            'Sakit' => $totalAbsensi > 0 ? round(($dataKehadiran['Sakit'] ?? collect())->count() / $totalAbsensi * 100, 1) : 0,
            'Izin' => $totalAbsensi > 0 ? round(($dataKehadiran['Izin'] ?? collect())->count() / $totalAbsensi * 100, 1) : 0,
            'Alpha' => $totalAbsensi > 0 ? round(($dataKehadiran['Alpha'] ?? collect())->count() / $totalAbsensi * 100, 1) : 0,
        ];


        return view('guru.dashboard', compact(
            'user',
            'totalKelasDiajar',
            'totalMateri',
            'jadwalHariIni',
            'dayName', 
            'rataRataNilaiUmum',
            'jadwalPerluInputNilai',
            'kehadiranStats',
            'totalAbsensi'
        ));
    }
}
