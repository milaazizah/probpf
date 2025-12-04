<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleSiswaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login'); // Arahkan ke login jika belum login
        }

        $user = Auth::user();

        // Periksa apakah role user adalah 'siswa'
        if ($user->role !== 'siswa') {
            // Jika bukan siswa, arahkan ke dashboard yang sesuai (atau error 403)
            
            if ($user->role === 'guru') {
                 return redirect()->route('guru.dashboard');
            }
            
            // Atau tampilkan error Forbidden
            abort(403, 'Akses Dibatasi. Anda bukan Siswa.'); 
        }
        return $next($request);
    }
}
