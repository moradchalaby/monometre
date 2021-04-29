<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brands;
use App\Categories;
use Illuminate\Support\Str;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['category'] = Categories::all();
        $data['brand'] = Brands::all()->sortBy('brand_must');
        return view('backend.brands.index', compact('data'));
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
        return view('backend.brands.create')->with('category', $category);
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
            'brand_title' => 'required',
           //'brand_content' => 'required'
        ]);
        if (strlen($request->brand_slug) > 3) {

            $slug = Str::slug($request->brand_slug);
        } else {
            $slug = Str::slug($request->brand_title);
        }
        if (strlen($request->brand_url) != null) {

            $request->validate([
                'brand_url' => 'active_url'
            ]);
        }

        if ($request->hasFile('brand_file')) {
            $request->validate([
                'brand_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid() . '.' . $request->brand_file->getClientOriginalExtension(); //benzersiz isim oluşturma
            $request->brand_file->move(public_path('images/brands'), $file_name);
            # code...
        } else {
            $file_name = null;
        }



        $brand = Brands::insert([
            "brand_title" => $request->brand_title,
            //"brand_slug" => $slug,
            "brand_url" => $request->brand_url,
            "brand_file" => $file_name,
            "brand_category" => $request->brand_category,
           // "brand_content" => $request->brand_content,
            "brand_status" => $request->brand_status
        ]);
        if ($brand) {
            return redirect(route('brand.index'))->with('success', 'Kayıt İşlemi Başarılı');
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
        $category = Categories::all();

        $brands = Brands::where('id', $id)->first();
        return view('backend.brands.edit')->with('brands', $brands)->with('category', $category);
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
            'brand_title' => 'required',
           // 'brand_content' => 'required'
        ]);
        if (strlen($request->brand_slug) > 3) {

            $slug = Str::slug($request->brand_slug);
        } else {
            $slug = Str::slug($request->brand_title);
        }
        if (strlen($request->brand_url) != null) {

            $request->validate([
                'brand_url' => 'active_url'
            ]);
        }

        if ($request->hasFile('brand_file')) {
            $request->validate([

                'brand_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid() . '.' . $request->brand_file->getClientOriginalExtension(); //benzersiz isim oluşturma
            $request->brand_file->move(public_path('images/brands'), $file_name);
            $path = 'images/brands/' . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }
        } else {
            $file_name = $request->old_file;
        }



        $brand = Brands::where('id', $id)->update([
            "brand_title" => $request->brand_title,
            "brand_category" => $request->brand_category,
            //"brand_slug" => $slug,
            "brand_url" => $request->brand_url,
            "brand_file" => $file_name,
            //"brand_content" => $request->brand_content,
            "brand_status" => $request->brand_status
        ]);
        if ($brand) {
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
        $brand = Brands::find(intval($id));
        if ($brand->delete()) {
            echo 1;
        }
        echo 0;
    }

    //sortable


    public function sortable()
    {
        //    print_r($_POST['item']);
        foreach ($_POST['item'] as $key => $value) {
            $brands = Brands::find(intval($value));
            $brands->brand_must = intval($key);
            $brands->save();
        }
        echo true;
    }
}
