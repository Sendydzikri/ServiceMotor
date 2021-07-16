<?php

namespace App\Http\Middleware;

use Closure;

class cek_loginMiddle
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
        if(!session('login')){
            return redirect('/login')->with('message','Mohon Login terlebih dahulu !');
        }
        return $next($request);
    }
}
