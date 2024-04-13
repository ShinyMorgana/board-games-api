<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Global HTTP middleware
        // Existing global middleware...
    ];

    protected $middlewareGroups = [
        'web' => [
            \Illuminate\Http\Middleware\HandleCors::class,
        ],

        'api' => [
            // The 'api' middleware group
            \Illuminate\Http\Middleware\HandleCors::class, // Add CORS middleware here for all API routes
            // Other existing API middleware...
            
        ],
    ];

    protected $routeMiddleware = [
        // Route middleware with keys
        'cors' => \Illuminate\Http\Middleware\HandleCors::class, // Register the CORS middleware for optional route-specific use
        // Other existing route middleware...
    ];
}