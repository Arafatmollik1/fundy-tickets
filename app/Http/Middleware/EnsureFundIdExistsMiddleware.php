<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureFundIdExistsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the session does not contain 'fund_id' and the current route is not '/get-fund-id'
        if (! $request->session()->has('fund_id') && ! $request->is('get-fund-id')) {
            // Redirect to '/get-fund-id'
            return redirect('/get-fund-id');
        }

        return $next($request);
    }
}
