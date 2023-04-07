<?php

namespace App\Http\Controllers;

use App\Models\TbUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        //$request['password']=bcrypt($request['password']);
        $credential = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ], [
            'email.required' => 'NIP wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        // $data = [
        //     'email' => $request->input('email'),
        //     'password' => $request->input('password'),
        // ];
        if (Auth::attempt($credential)) {
            //kalau berhasil
            $request->session()->regenerate();
            if (Auth::user()->jabatan_user == 'Admin') {

                return redirect()->intended('admin/dashboard');

            } else if (Auth::user()->jabatan_user == 'Manager') {

                return redirect()->intended('manager/dashboard');

            } else if (Auth::user()->jabatan_user == 'Leader OB' || 'Komandan Regu') {

                return redirect()->intended('petugas/dashboard');
                
            } 
        }   else {
            return back()->with('loginError', 'Login Gagal');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
