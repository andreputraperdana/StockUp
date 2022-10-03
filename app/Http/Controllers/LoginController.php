<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getindex(){
        return view('login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('beranda');
        }
        else{
            return redirect('/login');
        }
    }

    public function Logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
