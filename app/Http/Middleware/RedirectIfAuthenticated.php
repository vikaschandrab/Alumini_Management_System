<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        if (empty($guards))
        {
            foreach ($guards as $guard) {
                if(Auth::user()->userType == 'ADMIN')
                {
                    return $next($request);
                }
                else if(Auth::user()->userType == 'ALUMINI')
                {
                    return $next($request);
                }
                else if(Auth::user()->userType == 'STUDENT')
                {
                    return $next($request);
                }
            }
        }
        else
        {
            return $next($request);
        }

    }
}
