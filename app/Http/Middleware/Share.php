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



        $data['settings']=Settings::all()->where('settings_status',1);

        foreach ($data['settings'] as $key ) {
            $settings[$key->settings_key]=$key->settings_value;
        }

        $cat = Categories::all()->sortby('category_must');
        $page = Pages::all()->sortby('page_must')->slice(0, 3);




        $settings['slug']=$page;

        $settings['cat'] = $cat;
        View::share($settings);
        return $next($request);
    }
}
