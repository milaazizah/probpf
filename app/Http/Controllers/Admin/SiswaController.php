<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    // ──────────────────────── INDEX ────────────────────────
    public function index(Request $request)
    {
        $search  = $request->search;
        $kelas   = $request->kelas;

        $siswa = Siswa::with('user')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
                });
            })
            ->when($kelas, fn($q) => $q->where('kelas', $kelas))
            ->orderBy('id', 'desc')
            ->paginate(10);

        $kelasList = Siswa::select('kelas')->distinct()->pluck('kelas');

        return view('admin.siswa.index', compact('siswa', 'search', 'kelas', 'kelasList'));
    }

    // ──────────────────────── CREATE ────────────────────────
    public function create()
    {
        return view('admin.siswa.create');
    }

    // ──────────────────────── STORE ────────────────────────
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email|unique:users,email',
            'kelas'  => 'required',
        ]);

        // 1. Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => bcrypt('password'),
            'role' => 'murid',
        ]);

        // 2. Buat data siswa
        Siswa::create([
            'user_id' => $user->id,
            'kelas'   => $request->kelas,
        ]);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    // ──────────────────────── EDIT ────────────────────────
    public function edit($id)
    {
        $siswa = Siswa::with('user')->findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    // ──────────────────────── UPDATE ────────────────────────
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $user  = $siswa->user;

        $request->validate([
            'name'   => 'required',
            'email'  => "required|email|unique:users,email,$user->id",
            'kelas'  => 'required',
        ]);

        // Update user
        $user->update([
            'name'  => $request->name,
            'email' => $request->email
        ]);

        // Update siswa
        $siswa->update([
            'kelas' => $request->kelas
        ]);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    // ──────────────────────── DELETE ────────────────────────
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        // Hapus user juga
        $siswa->user->delete();
        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}
