<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa user sudah login dan nilai access_user = 1
        if (Auth::check() && Auth::user()->access_user == 1) {
            return $next($request);
        }

        // Jika access_user = 0, arahkan kembali ke halaman sebelumnya dan menampilkan pesan error
        return redirect()->back()->with('error', 'Anda tidak memiliki izin.');
    }
}
