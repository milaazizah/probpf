<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekRoleGuru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role = 'guru'): Response
    {
        // Cek apakah user sudah login DAN role-nya sesuai
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }

        // Jika role tidak sesuai, arahkan kembali ke halaman login (atau halaman utama)
        return redirect('/login')->with('error', 'Akses ditolak. Anda tidak memiliki izin sebagai ' . ucfirst($role));
    }
}
