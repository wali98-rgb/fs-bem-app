<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userrole): Response
    {
        if (auth()->user()->role == $userrole) {
            return $next($request);
        }

        return redirect()->back()->with('error', 'Maaf Anda tidak memiliki hak akses!');
    }
}
