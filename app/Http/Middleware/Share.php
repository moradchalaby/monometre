<?php

namespace App\Http\Middleware;

use App\Categories;
use App\Pages;
use App\Settings;
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

        $cat = Categories::all()->sortby('category_must');
        $page = Pages::all()->sortby('page_must')->slice(0, 3);
        $logo=Settings::all()->where('settings_key','logo')->first();
        $settings['slug']=$page;
        $settings['logo']=$logo;
        $settings['cat'] = $cat;
        View::share($settings);
        return $next($request);
    }
}
