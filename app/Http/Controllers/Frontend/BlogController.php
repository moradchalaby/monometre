<?php

namespace App\Http\Controllers\Frontend;

use App\Blogs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $data['blog'] = Blogs::all()->sortby('blog_must');

        return view('frontend.blog.index', compact('data'));
    }

    public function detail($slug)
    {
        $blogList = Blogs::all()->sortby('blog_must')->slice(0,4);
        $blog=Blogs::where('blog_slug',$slug)->first();
        return view('frontend.blog.detail', compact('blog','blogList'));
    }
}
