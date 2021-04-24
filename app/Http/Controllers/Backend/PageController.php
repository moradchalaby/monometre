<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pages;
use Illuminate\Support\Str;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['page']=Pages::all()->sortBy('page_must');
        return view('backend.pages.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.pages.create');
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
            'page_title' => 'required',
            'page_content' => 'required'
        ]);
        if (strlen($request->page_slug)>3) {

            $slug=Str::slug($request->page_slug);
        }else {
            $slug = Str::slug($request->page_title);
        }


        if ($request->hasFile('page_file')) {
            $request->validate([
                'page_file'=>'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name=uniqid().'.'.$request->page_file->getClientOriginalExtension();//benzersiz isim oluşturma
            $request->page_file->move(public_path('images/pages'),$file_name);
            # code...
        }else {
            $file_name=null;
        }



        $page=Pages::insert([
            "page_title"=> $request->page_title,
            "page_slug" => $slug,
            "page_file" => $file_name,
            "page_content" => $request->page_content,
            "page_status" => $request->page_status
        ]);
        if ($page) {
            return redirect(route('page.index'))->with('success', 'Kayıt İşlemi Başarılı');
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
        $pages = Pages::where('id', $id)->first();
        return view('backend.pages.edit')->with('pages', $pages);
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
            'page_title' => 'required',
            'page_content' => 'required'
        ]);
        if (strlen($request->page_slug) > 3) {

            $slug = Str::slug($request->page_slug);
        } else {
            $slug = Str::slug($request->page_title);
        }


        if ($request->hasFile('page_file')) {
            $request->validate([
                'page_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid() . '.' . $request->page_file->getClientOriginalExtension(); //benzersiz isim oluşturma
            $request->page_file->move(public_path('images/pages'), $file_name);
            $path='images/pages/'.$request->old_file;
            if (file_exists($path)) {
               @unlink(public_path($path));
            }
        } else {
            $file_name = $request->old_file;
        }



        $page = Pages::where('id',$id)->update([
            "page_title" => $request->page_title,
            "page_slug" => $slug,
            "page_file" => $file_name,
            "page_content" => $request->page_content,
            "page_status" => $request->page_status
        ]);
        if ($page) {
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
        $page = Pages::find(intval($id));
        if ($page->delete()) {
echo 1;
        }
        echo 0;
    }

    //sortable


    public function sortable()
    {
        //    print_r($_POST['item']);
        foreach ($_POST['item'] as $key => $value) {
            $pages = Pages::find(intval($value));
            $pages->page_must = intval($key);
            $pages->save();
        }
        echo true;
    }
}
