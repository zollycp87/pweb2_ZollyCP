<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request){
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required'=> 'NIP wajib diisi' ,
            'password.required'=> 'Password wajib diisi' 
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($credential)){
            //kalau berhasil
            $request->session()->regenerate('user');
            return redirect()->intended('/dashboard');
        } 

        return back()->with('loginError', 'Login Gagal');
    }

}
