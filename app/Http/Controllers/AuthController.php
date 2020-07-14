<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function dashboard(){
        if(Auth::check() === true){
            return view('dashboard.dashboard');
        }
        
        return redirect()->route('adm.login');
    }

    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('adm');
        }
        
        return redirect()->back()->withInput()->withErrors(['Dados de login estão errados']);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('adm');
    }
}
