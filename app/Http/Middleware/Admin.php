<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;



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

        if (! Auth::guest() && Auth::user()->role=='5') {
            return $next($request);
        }else {
            return redirect(route('nedmin.Login'))->with('error', 'Erişim Yetkiniz Yoktur');
        }



        return redirect(route('nedmin.Login'));
    }
}
