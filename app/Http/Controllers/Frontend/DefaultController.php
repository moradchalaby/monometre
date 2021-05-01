<?php

namespace App\Http\Controllers\Frontend;

use App\Blogs;
use App\Brands;
use App\Categories;
use App\Http\Controllers\Controller;
use App\Pages;
use App\Products;
use App\Settings;
use App\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

use Illuminate\Support\Facades\Hash;

class DefaultController extends Controller
{

    public function index()
    {
        $data['category'] = Categories::all()->where('category_status', 1)->sortby('category_must');
        $data['product'] = Products::all()->where('product_status', 1)->sortby('product_must');
        $data['brand'] = Brands::all()->where('brand_status', 1)->sortby('brand_must');
        $data['blog'] = Blogs::all()->where('blog_status', 1)->sortby('blog_must');
        $data['phone']= Settings::all()->where('settings_status', 1)->where('settings_key', 'phone_gsm')->first();
        $data['page'] = Pages::all()->where('page_status', 1)->sortby('page_must');
        $data['slider']=Sliders::all()->where('slider_status', 1)->sortby('slider_must');
        return view('frontend.default.index',compact('data'));
    }

    public function contact()
    {

        return view('frontend.default.contact', compact('data'));
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ]);

        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];
        Mail::to('celebi55.mc@gmail.com')->send(new sendMail($data));

        return back()->with('success','Mail Başarıyla Gönderildi');
    }
}
