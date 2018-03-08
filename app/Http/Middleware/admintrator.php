<?php

namespace App\Http\Middleware;

use Closure;

class admintrator
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
        if(Auth::check()&&Auth::user()->rule<3){
            return $next($request);
        }else{
            return redirect('/');
        }

    }
}
