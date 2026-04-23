<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    // 🔥 DAFTARKAN MIDDLEWARE DI SINI
    ->withMiddleware(function (Middleware $middleware): void {

        $middleware->alias([
            // 🔐 ROLE MIDDLEWARE
            'role' => \App\Http\Middleware\RoleMiddleware::class,

            // 🔐 (opsional kalau mau dipakai nanti)
            'penyewa' => \App\Http\Middleware\PenyewaMiddleware::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();