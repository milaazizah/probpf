<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role   Role yang diperbolehkan (admin/guru/siswa)
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Jika belum login → ke halaman login
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Jika role tidak sesuai → tolak
        if ($user->role !== $role) {
            abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk role: ' . $role);
        }

        return $next($request);
    }
}
