<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminGuruController extends Controller
{
    public function index()
    {
        $guru = User::where('role', 'guru')->get();

        return view('admin.guru.index', compact('guru'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:5',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => 'guru',
        ]);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $guru = User::findOrFail($id);

        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = User::findOrFail($id);

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $guru->id,
        ]);

        $guru->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil diperbarui');
    }

    public function destroy($id)
    {
        $guru = User::findOrFail($id);

        $guru->delete();

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil dihapus');
    }
}
