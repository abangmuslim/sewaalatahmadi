<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// ⬇️ tambahkan ini
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\PenyewaMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        // ✅ DAFTARKAN ALIAS MIDDLEWARE DI SINI
        $middleware->alias([
            'role' => RoleMiddleware::class,
            'penyewa' => PenyewaMiddleware::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();