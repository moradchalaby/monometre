<?php

namespace App\Http\Controllers\Frontend;

use App\Blogs;
use App\Brands;
use App\Categories;
use App\Http\Controllers\Controller;
use App\Pages;
use App\Products;
use App\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DefaultController extends Controller
{

    public function index()
    {
        $data['category'] = Categories::all()->sortby('category_must');
        $data['product'] = Products::all()->sortby('product_must');
        $data['brand'] = Brands::all()->sortby('brand_must');
        $data['blog'] = Blogs::all()->sortby('blog_must');
        $data['page'] = Pages::all()->sortby('page_must');
        $data['slider']=Sliders::all()->sortby('slider_must');
        return view('frontend.default.index',compact('data'));
    }
}
