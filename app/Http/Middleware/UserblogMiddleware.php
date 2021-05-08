<?php

namespace App\Http\Middleware;

use Closure;

class UserblogMiddleware
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
        if(!\Auth::check())
           {
            return redirect(url('/signup'));
           } 
        return $next($request);
    }
}
