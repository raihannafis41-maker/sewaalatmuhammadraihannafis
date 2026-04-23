<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenyewaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('penyewa_id')) {
            return redirect()->route('auth.penyewa.login');
        }

        return $next($request);
    }
}
