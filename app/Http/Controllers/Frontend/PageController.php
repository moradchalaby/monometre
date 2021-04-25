<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pages;
use App\Sliders;

class PageController extends Controller
{
    public function detail($slug)
    {
        $sliders=Sliders::all();
        $pageList = Pages::all()->sortby('page_must')->slice(0, 4);;
        $page = Pages::where('page_slug', $slug)->first();
        return view('frontend.page.detail', compact('page', 'pageList','sliders'));
    }
}