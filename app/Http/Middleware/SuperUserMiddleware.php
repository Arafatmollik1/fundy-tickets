<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && User::isSuperUser()) {
            return $next($request);
        }

        return redirect('/login');
    }
}
