<?php

namespace App\Http\Controllers\Frontend;

use App\Brands;
use App\Categories;
use App\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
        if ($id!=0) {
            $data['product'] = Products::all()->where('product_category', $id);
        }else {

            $data['product'] = Products::all()->sortby('product_must');
        }

        $data['category'] = Categories::all();
        return view('frontend.product.index', compact('data'));
    }

    public function detail($id)
    {
        $data['category'] = Categories::all();
        $data['brand'] = Brands::all();
        $productList = Products::all()->sortby('product_must')->slice(0,4);
        $product=Products::where('id',$id)->first();
        return view('frontend.product.detail', compact('product','productList','data'));
    }
}
