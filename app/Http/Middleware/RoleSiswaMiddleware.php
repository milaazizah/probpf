<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleSiswaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // 1. Cek jika masih calon siswa → jangan izinkan masuk halaman siswa
        if ($user->role === 'calon_siswa') {
            Auth::logout();
            return redirect('/login')->withErrors([
                'email' => 'Pendaftaran kamu masih diproses admin.'
            ]);
        }

        // 2. Cek role yang benar
        if ($user->role !== 'siswa') {
            abort(403, 'Akses ditolak. Anda bukan Siswa.');
        }

        return $next($request);
    }
}
