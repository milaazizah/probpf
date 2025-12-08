<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $jumlahGuru  = User::where('role', 'guru')->count();
        $jumlahSiswa = User::where('role', 'siswa')->count();

        $guruBaru = User::where('role', 'guru')
                        ->latest()
                        ->take(5)
                        ->get();

        $siswaBaru = User::where('role', 'siswa')
                         ->latest()
                         ->take(5)
                         ->get();

        return view('admin.dashboard', compact(
            'jumlahGuru',
            'jumlahSiswa',
            'guruBaru',
            'siswaBaru'
        ));
    }

    // ============================
    // 1. LIST CALON SISWA
    // ============================
    public function listCalon()
    {
        $calon = User::where('role', 'calon_siswa')
                     ->orderBy('created_at', 'desc')
                     ->get();

        return view('admin.pendaftaran.index', compact('calon'));
    }

    // ============================
    // 2. APPROVE CALON SISWA
    // ============================
    public function approve($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'status_akun' => 'approved',
            'role'        => 'siswa'
        ]);

        return back()->with('success', 'Calon siswa berhasil diterima!');
    }

    // ============================
    // 3. DECLINE CALON SISWA
    // ============================
    public function decline($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'status_akun' => 'declined'
        ]);

        return back()->with('warning', 'Pendaftaran calon siswa ditolak!');
    }
}
