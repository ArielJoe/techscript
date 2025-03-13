<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // Global middleware...
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array>
     */
    protected $middlewareGroups = [
        'web' => [
            // Web middleware...
        ],
        'api' => [
            // API middleware...
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'admin' => \App\Http\Middleware\CheckAdmin::class,
        'student' => \App\Http\Middleware\CheckStudent::class,
    ];
}
