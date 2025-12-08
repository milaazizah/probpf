<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // ─────────────────────── DASHBOARD ───────────────────────
    public function index()
    {
        $jumlahGuru       = User::where('role', 'guru')->count();
        $jumlahSiswa      = User::where('role', 'siswa')->count();
        $jumlahPendaftar  = User::where('role', 'calon_siswa')->count();

        $guruBaru      = User::where('role', 'guru')->latest()->take(5)->get();
        $siswaBaru     = User::where('role', 'siswa')->latest()->take(5)->get();
        $pendaftarBaru = User::where('role', 'calon_siswa')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'jumlahGuru',
            'jumlahSiswa',
            'jumlahPendaftar',
            'guruBaru',
            'siswaBaru',
            'pendaftarBaru'
        ));
    }

    // ─────────────────────── LIST CALON SISWA ───────────────────────
    public function listCalon()
    {
        $calon = User::where('role', 'calon_siswa')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.pendaftaran.index', compact('calon'));
    }

    // ─────────────────────── APPROVE CALON SISWA ───────────────────────
    public function approve(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'status_akun' => 'approved',
            'role'        => 'siswa',
        ]);

        // Tambahkan ke tabel siswa
        Siswa::create([
            'user_id'    => $user->id,
            'nama_siswa' => $user->name,
            'nis'        => $request->nis ?? 'NIS-' . str_pad($user->id, 5, '0', STR_PAD_LEFT),
            'kelas'      => $request->kelas ?? 'Belum Ditentukan',
        ]);

        return back()->with('success', 'Calon siswa berhasil diterima!');
    }

    // ─────────────────────── DECLINE CALON SISWA ───────────────────────
    public function decline($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'status_akun' => 'declined',
        ]);

        return back()->with('warning', 'Pendaftaran calon siswa ditolak!');
    }
}
