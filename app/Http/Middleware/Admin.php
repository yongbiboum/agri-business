<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'agent') {
            return redirect('/agent');
        }
        elseif (Auth::check() && Auth::user()->role == 'producteur') {
            return redirect('/producteur');
        }
        else {
            return redirect('/client');
        }
    }
}
