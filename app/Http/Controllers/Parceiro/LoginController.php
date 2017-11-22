<?php

namespace App\Http\Controllers\Parceiro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        if(Auth::guard('parceiro')->user()){
            return redirect('Parceiro');
        }
        return view('parceiro.login');
    }
    
    public function makeLogin(\App\Http\Requests\LoginRequest $request)
    {
        if (Auth::guard('parceiro')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Authentication passed...
            return redirect()->intended('Parceiro/');
            
        }
        return redirect()->back()->withErrors(['Nome de usuário ou senha preenchidos incorretamente.']);
    }
    
    public function logout()
    {
        Auth::guard('parceiro')->logout();
        return redirect('Parceiro/login');
    }
}
