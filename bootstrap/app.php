<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
<<<<<<< HEAD
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\CheckAdmin::class,
            'kaprodi' => \App\Http\Middleware\CheckKaprodi::class,
            'mo' => \App\Http\Middleware\CheckMO::class,
            'mahasiswa' => \App\Http\Middleware\CheckMahasiswa::class,
        ]);
=======
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
>>>>>>> e8489abcd84da377b1d0da4713bff0d153315699
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
