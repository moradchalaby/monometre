<?php

namespace App\Http\Controllers\Frontend;

use App\Blogs;
use App\Http\Controllers\Controller;
use App\Pages;
use App\Sliders;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index()
    {
        $data['blog'] = Blogs::all()->sortby('blog_must');
        $data['page'] = Pages::all()->sortby('page_must');
        $data['slider']=Sliders::all()->sortby('slider_must');
        return view('frontend.default.index',compact('data'));
    }
}
