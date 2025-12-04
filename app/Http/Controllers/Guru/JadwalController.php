<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /** Tampilkan daftar jadwal yang dibuat oleh Guru yang sedang login. */
    public function index()
    {
        $jadwals = Auth::user()->jadwals()->orderBy('hari')->orderBy('waktu_mulai')->get();
        return view('guru.jadwal.index', compact('jadwals'));
    }

    /** Tampilkan form untuk membuat jadwal baru. */
    public function create()
    {
        // Daftar hari dan kelas yang bisa dipilih (contoh statis)
        $haris = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $kelases = ['Kelas A', 'Kelas B', 'Kelas C', 'Kelas D'];
        return view('guru.jadwal.create', compact('haris', 'kelases'));
    }

    /** Simpan jadwal baru ke database. */
    public function store(Request $request)
    {
        $request->validate([
            'mata_pelajaran' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        Auth::user()->jadwals()->create($request->all());

        return redirect()->route('guru.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    /** Tampilkan form untuk mengedit jadwal tertentu. */
    public function edit(Jadwal $jadwal)
    {
        // Pastikan guru yang login adalah pemilik jadwal
        if ($jadwal->user_id !== Auth::id()) {
            abort(403);
        }
        $haris = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $kelases = ['10 IPA 1', '10 IPA 2', '11 IPS 1', '12 IPA 3'];
        return view('guru.jadwal.edit', compact('jadwal', 'haris', 'kelases'));
    }

    /** Update jadwal di database. */
    public function update(Request $request, Jadwal $jadwal)
    {
        if ($jadwal->user_id !== Auth::id()) { abort(403); }

        $request->validate([
            'mata_pelajaran' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('guru.jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    /** Hapus jadwal dari database. */
    public function destroy(Jadwal $jadwal)
    {
        if ($jadwal->user_id !== Auth::id()) { abort(403); }

        $jadwal->delete();
        return redirect()->route('guru.jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}