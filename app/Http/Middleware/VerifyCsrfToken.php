<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $addHttpCookie = true;
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'auth/facebook/callback',
        'auth/google/callback',
        'http://127.0.0.1:8000/webhook',
        'http://127.0.0.1:8000/webhook2',
        'https://sandbox.shelvaldes.com/webhook',
        'https://sandbox.shelvaldes.com/webhook2'
    ];
}
