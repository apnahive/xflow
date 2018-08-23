<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class IsVerified
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
        if(!auth()->user()->verified){
            Session::flush();
            return redirect('login')->withAlert('Please verify your email before login.');
        }
        return $next($request);
        //return $next($request);
    }
}
