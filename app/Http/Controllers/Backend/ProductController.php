<?php

namespace App\Http\Controllers\Backend;

use App\Categories;
use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['category']=Categories::all();
        $data['product'] = Products::all()->sortBy('product_must');


        return view('backend.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Categories::all();
        return view('backend.products.create')->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'product_title' => 'required',
            //'product_content' => 'required'
        ]);
        if (strlen($request->product_slug) > 3) {

            $slug = Str::slug($request->product_slug);
        } else {
            $slug = Str::slug($request->product_title);
        }
        /* if (strlen($request->product_url) != null) {

            $request->validate([
                'product_url' => 'active_url'
            ]);
        } */

        if ($request->hasFile('product_file')) {
            $request->validate([
                'product_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid() . '.' . $request->product_file->getClientOriginalExtension(); //benzersiz isim oluşturma
            $request->product_file->move(public_path('images/products'), $file_name);
            # code...
        } else {
            $file_name = null;
        }



        $product = Products::insert([
            "product_title" => $request->product_title,
            "product_slug" => $slug,
            "product_category" => $request->product_category,
            "product_price" => $request->product_price,
            "product_stock" => $request->product_stock,
            "product_file" => $file_name,
            "product_content" => $request->product_content,
            "product_status" => $request->product_status
        ]);
        if ($product) {
            return redirect(route('product.index'))->with('success', 'Kayıt İşlemi Başarılı');
            # code...
        }
        return back()->with('error', 'Kayıt İşlemi Başarısız');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Categories::all();
        $products = Products::where('id', $id)->first();
        return view('backend.products.edit')->with('products', $products)->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'product_title' => 'required',
            // 'product_content' => 'required'
        ]);
        if (strlen($request->product_slug) > 3) {

            $slug = Str::slug($request->product_slug);
        } else {
            $slug = Str::slug($request->product_title);
        }
        /* if (strlen($request->product_url) != null) {

            $request->validate([
                'product_url' => 'active_url'
            ]);
        } */

        if ($request->hasFile('product_file')) {
            $request->validate([

                'product_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid() . '.' . $request->product_file->getClientOriginalExtension(); //benzersiz isim oluşturma
            $request->product_file->move(public_path('images/products'), $file_name);
            $path = 'images/products/' . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }
        } else {
            $file_name = $request->old_file;
        }



        $product = Products::where('id', $id)->update([
            "product_title" => $request->product_title,
            "product_slug" => $slug,
            "product_category" => intval($request->product_category),
            "product_price" => $request->product_price,
            "product_stock" => $request->product_stock,
            "product_file" => $file_name,
            "product_content" => $request->product_content,
            "product_status" => $request->product_status

        ]);
        if ($product) {
            return back()->with('success', 'Kayıt İşlemi Başarılı');
            # code...
        }
        return back()->with('error', 'Kayıt İşlemi Başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Products::find(intval($id));
        if ($product->delete()) {
            echo 1;
        }
        echo 0;
    }

    //sortable


    public function sortable()
    {
        //    print_r($_POST['item']);
        foreach ($_POST['item'] as $key => $value) {
            $products = Products::find(intval($value));
            $products->product_must = intval($key);
            $products->save();
        }
        echo true;
    }
}
