<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class DefaultController extends Controller
{
    public function index()
    {

        return view('backend.default.index');
    }
    public function login()
    {
        $user=User::all()->first();
        if ($user) {
            return view('backend.default.login');
        }else{
            return view('backend.default.register');
        }

    }
    public function authenticate(Request $request)
    {

        $request->flash(); //formdaki veriler geri gelindiğinde silinmiyor

        $credentials=$request->only('email','password');


        $remember_me=$request->has('remember__me') ? true : false;

        if (Auth::attempt($credentials,$remember_me) ) {
            return redirect()-> intended(route('nedmin.Index'));
        } else {
            return back()->with('error','Giriş Başarısız');
        }
    }

    public function logout(){
    Auth::logout();
    return redirect(route('nedmin.Login'))->with('success', 'Güvenli Çıkış Yapıldı');
    }
}
