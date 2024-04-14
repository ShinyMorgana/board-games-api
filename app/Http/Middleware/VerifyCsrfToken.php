<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // Add a wildcard pattern to exclude all routes from CSRF verification
        '*',
    ];

    /**
     * Determine if the HTTP request uses a ‘read’ verb.
     *
     * @param  string  $method
     * @return bool
     */
    protected function inExceptArray($request)
    {
        // Add custom logic here if necessary
        return parent::inExceptArray($request);
    }
}
