<?php

namespace App\Http\Middleware;

use App\Pages;
use Closure;
use Illuminate\Support\Facades\View;
class Share
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


        $page = Pages::all()->sortby('page_must')->slice(0, 3);

        $settings['slug']=$page;
        View::share($settings);
        return $next($request);
    }
}
