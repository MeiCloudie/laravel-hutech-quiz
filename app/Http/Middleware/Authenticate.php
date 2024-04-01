<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // if ($request->expectsJson()) {
        //     return null;
        // }
    
        // Check if user is authenticated with JWT token
        if ($request->cookie('accessToken')) {
            return null;
        }
    
        return route('login');
    }
}
