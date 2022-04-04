<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if(auth()->user())
        {
            return redirect('/admin');
        }
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        //user is_admin=yes
        $cred = $request->only('email', 'password'); // ['email' => 'admin@gmail.com', 'password' => 'admin123']
        if (Auth::attempt($cred)) {
            if (auth()->user()->is_admin == 'yes') {
                return redirect('/admin');
            }
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function logout(){
        Auth::logout();
        return redirect('/admin/login');
    }
}
