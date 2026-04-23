<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // ❌ belum login
        if (!Auth::check()) {
            return redirect()->route('auth.user.login');
        }

        $user = Auth::user();

        // ❌ role tidak sesuai
        if (!in_array($user->role, $roles)) {
            abort(403, 'Akses ditolak');
        }

        return $next($request);
    }
}