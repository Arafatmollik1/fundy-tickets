<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in and is a superuser
        if (Auth::check() && Auth::user()->email === 'superuser@example.com') {
            return $next($request);
        }

        return redirect('/');
    }
}
