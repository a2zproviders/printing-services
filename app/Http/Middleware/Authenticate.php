<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    // public function handle($request, Closure $next, $guard = null)
    // {
    //     if (!Auth::guard($guard)->check()) {
    //         if ($guard == "admin") {
    //             return redirect(route('admin_login'));
    //         } else {
    //             return redirect(route('login'));
    //         }
    //     }
    //     return $next($request);
    // }
    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return url('/');
        }
    }
}
