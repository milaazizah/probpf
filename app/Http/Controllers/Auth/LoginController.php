<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Tampilkan Form Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Email atau Password salah.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Mekanisme Status Akun Calon Siswa
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'calon_siswa') {

            if ($user->status_akun === 'pending') {
                Auth::logout();
                return redirect()->route('login')
                    ->with('warning', 'Pendaftaran kamu sedang diproses admin.');
            }

            if ($user->status_akun === 'declined') {
                Auth::logout();
                return redirect()->route('login')
                    ->with('error', 'Pendaftaran kamu ditolak oleh admin.');
            }

            if ($user->status_akun === 'approved') {
                // Jika approved → otomatis jadi siswa
                $user->update([
                    'role' => 'siswa'
                ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Redirect Berdasarkan Role
        |--------------------------------------------------------------------------
        */

        if ($user->role === 'admin') {
            return redirect()->intended(route('admin.dashboard'));
        }

        if ($user->role === 'guru') {
            return redirect()->intended(route('guru.dashboard'));
        }

        if ($user->role === 'siswa') {
            return redirect()->intended(route('siswa.dashboard'));
        }

        return redirect('/');
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
