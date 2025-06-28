<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        } else {
            return redirect()->back()->with('erro','Usuário ou senha inválido');
        }
    }
}
