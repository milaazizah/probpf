<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    // Tampilkan Form Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses Login Email & Password
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

        return $this->handleRoleRedirect($user);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

public function handleGoogleCallback()
{
    try {
        $googleUser = Socialite::driver('google')->user();
        $email = $googleUser->email;

        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('login')
                ->with('error', 'Akun Google ini belum terdaftar.');
        }

        Auth::login($user, true);

        // Redirect berdasarkan role / status
        return $this->handleRoleRedirect($user);

    } catch (\Exception $e) {
        return redirect()->route('login')
            ->with('error', 'Login Google gagal: ' . $e->getMessage());
    }
}

// Buat function helper untuk redirect role
private function handleRoleRedirect($user)
{
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
            $user->update(['role' => 'siswa']);
        }
    }

    if ($user->role === 'admin') return redirect()->route('admin.dashboard');
    if ($user->role === 'guru') return redirect()->route('guru.dashboard');
    if ($user->role === 'siswa') return redirect()->route('siswa.dashboard');

    return redirect('/');
}
}
