<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\VerifyCsrfToken;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Global HTTP middleware
        // Existing global middleware...
        \App\Http\Middleware\VerifyCsrfToken::class,
        
    ];

    protected $middlewareGroups = [
        'web' => [
            \Illuminate\Http\Middleware\HandleCors::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [
            // The 'api' middleware group
            \Illuminate\Http\Middleware\HandleCors::class, // Add CORS middleware here for all API routes
            \App\Http\Middleware\VerifyCsrfToken::class,
            
        ],
    ];

    protected $routeMiddleware = [
        // Route middleware with keys
        'cors' => \Illuminate\Http\Middleware\HandleCors::class, // Register the CORS middleware for optional route-specific use
        // Other existing route middleware...
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        
        \App\Http\Middleware\VerifyCsrfToken::class,
    ];
}