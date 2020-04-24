<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //checking whether user's role id is equal to 1 which means it is admin
        if (Auth::check() && Auth::user()->id == 1) {
            return $next($request);
        }
        else
        {
            return redirect()->route('login');
        }
    }
}
