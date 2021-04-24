<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['user'] = User::all()->sortBy('role');
        return view('backend.users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.users.create');
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|Min:6'
        ]);
      /*   if (strlen($request->user_slug) > 3) {

            $slug = Str::slug($request->user_slug);
        } else {
            $slug = Str::slug($request->user_title);
        }
        if (strlen($request->user_url) != null) {

            $request->validate([
                'user_url' => 'active_url'
            ]);
        } */

        if ($request->hasFile('user_file')) {
            $request->validate([
                'user_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid() . '.' . $request->user_file->getClientOriginalExtension(); //benzersiz isim oluşturma
            $request->user_file->move(public_path('images/users'), $file_name);
            # code...
        } else {
            $file_name = null;
        }



        $user = User::insert([
            "name" => $request->name,
            "username" =>  $request->username,
            "email" => $request->email,
            "user_file" => $file_name,
            "password" => Hash::make($request->password),
            "user_status" => $request->user_status
        ]);
        if ($user) {
            return redirect(route('user.index'))->with('success', 'Kayıt İşlemi Başarılı');
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
        $users = User::where('id', $id)->first();
        return view('backend.users.edit')->with('users', $users);
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email'
        ]);
       /*  if (strlen($request->user_slug) > 3) {

            $slug = Str::slug($request->user_slug);
        } else {
            $slug = Str::slug($request->user_title);
        }
        if (strlen($request->user_url) != null) {

            $request->validate([
                'user_url' => 'active_url'
            ]);
        } */

        if ($request->hasFile('user_file')) {
            $request->validate([

                'user_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file_name = uniqid() . '.' . $request->user_file->getClientOriginalExtension(); //benzersiz isim oluşturma
            $request->user_file->move(public_path('images/users'), $file_name);
            $path = 'images/users/' . $request->old_file;
            if (file_exists($path)) {
                @unlink(public_path($path));
            }
        } else {
            $file_name = $request->old_file;
        }
        if (strlen($request->password)>=6) {
            $request->validate([
                'password' => 'required|Min:6'
            ]);
            $pass = User::where('id', $id)->update([

                "password" => Hash::make($request->password)
            ]);
        }else{
            $pass=false;
        }



        $user = User::where('id', $id)->update([
            "name" => $request->name,
            "username" =>  $request->username,
            "email" => $request->email,
            "user_file" => $file_name,
            "user_status" => $request->user_status
        ]);
        if ($pass and $user) {
            return back()->with('success', 'Düzenleme İşlemi Başarılı Şifre Başarıyla Değiştirildi');
            # code...
        }elseif ($user) {
            # code...
            return back()->with('success', 'Düzenleme İşlemi Başarılı');
        } elseif ($pass) {
            # code...
            return back()->with('success', 'Şifre Başarıyla Değiştirildi');
        }
        return back()->with('error', 'Düzenleme İşlemi Başarısız');
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
        $user = User::find(intval($id));
        if ($user->delete()) {
            echo 1;
        }
        echo 0;
    }

    //sortable


    public function sortable()
    {
        //    print_r($_POST['item']);
        foreach ($_POST['item'] as $key => $value) {
            $users = User::find(intval($value));
            $users->user_must = intval($key);
            $users->save();
        }
        echo true;
    }
}
