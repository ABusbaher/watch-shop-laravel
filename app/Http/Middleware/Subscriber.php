<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Subscriber
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
        /*** Only users with role of subscriber allowed access ***/
        if(Auth::check()){
            if(Auth::user()->isSubscriber()){
                return $next($request);
            }
        }
        return redirect('index');
        return $next($request);
    }
}
