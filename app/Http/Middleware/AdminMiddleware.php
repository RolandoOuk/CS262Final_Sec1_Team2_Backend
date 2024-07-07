<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->isAdmin()) {
            return $next($request);
        }

        return redirect()->route('login'); // Redirect to login if not admin
    }
}
