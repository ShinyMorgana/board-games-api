<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Global HTTP middleware
    ];

    protected $middlewareGroups = [
        'web' => [
            // The 'web' middleware group
        ],

        'api' => [
            // The 'api' middleware group
        ],
    ];

    protected $routeMiddleware = [
        // Route middleware
        'cors' => \App\Http\Middleware\CorsMiddleware::class, // Registering your custom CORS middleware
        // other route middleware...
    ];
}

