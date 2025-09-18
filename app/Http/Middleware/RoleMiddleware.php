<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek user login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Cek role
        if (Auth::user()->role !== $role) {
            abort(403, 'Akses ditolak'); // forbidden
        }

        return $next($request);
    }
}
