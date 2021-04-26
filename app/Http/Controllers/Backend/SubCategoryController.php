<?php

namespace App\Http\Controllers\Backend;

use App\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['category'] = Categories::all()->sortBy('category_must');
        return view('backend.categories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.categories.create');
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
            'category_title' => 'required',
            //'category_content' => 'required'
        ]);
        if (strlen($request->category_slug) > 3) {

            $slug = Str::slug($request->category_slug);
        } else {
            $slug = Str::slug($request->category_title);
        }
        if (strlen($request->category_url) != null) {

            $request->validate([
                'category_url' => 'active_url'
            ]);
        }

        if ($request->hasFile('category_file')) {
            $request->validate([
                'category_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid() . '.' . $request->category_file->getClientOriginalExtension(); //benzersiz isim oluşturma
            $request->category_file->move(public_path('images/categories'), $file_name);
            # code...
        } else {
            $file_name = null;
        }



        $category = Categories::insert([
            "category_title" => $request->category_title,
            //"category_slug" => $slug,
            "category_url" => $request->category_url,
            "category_file" => $file_name,
            // "category_content" => $request->category_content,
            "category_status" => $request->category_status
        ]);
        if ($category) {
            return redirect(route('category.index'))->with('success', 'Kayıt İşlemi Başarılı');
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
        $categories = Categories::where('id', $id)->first();
        return view('backend.categories.edit')->with('categories', $categories);
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
            'category_title' => 'required',
            // 'category_content' => 'required'
        ]);
        if (strlen($request->category_slug) > 3) {

            $slug = Str::slug($request->category_slug);
        } else {
            $slug = Str::slug($request->category_title);
        }
        if (strlen($request->category_url) != null) {

            $request->validate([
                'category_url' => 'active_url'
            ]);
        }

        if ($request->hasFile('category_file')) {
            $request->validate([

                'category_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid() . '.' . $request->category_file->getClientOriginalExtension(); //benzersiz isim oluşturma
            $request->category_file->move(public_path('images/categories'), $file_name);
            $path = 'images/categories/' . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }
        } else {
            $file_name = $request->old_file;
        }



        $category = Categories::where('id', $id)->update([
            "category_title" => $request->category_title,
            //"category_slug" => $slug,
            "category_url" => $request->category_url,
            "category_file" => $file_name,
            //"category_content" => $request->category_content,
            "category_status" => $request->category_status
        ]);
        if ($category) {
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
        $category = Categories::find(intval($id));
        if ($category->delete()) {
            echo 1;
        }
        echo 0;
    }

    //sortable


    public function sortable()
    {
        //    print_r($_POST['item']);
        foreach ($_POST['item'] as $key => $value) {
            $categories = Categories::find(intval($value));
            $categories->category_must = intval($key);
            $categories->save();
        }
        echo true;
    }
}
