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
        return view('parceiro.login');
    }
    
    public function makeLogin(\App\Http\Requests\LoginRequest $request)
    {
        if (Auth::guard('parceiro')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Authentication passed...
            return redirect()->intended('Parceiro/');
            dd('usuário autenticado');
        }
        return redirect()->back();
    }
    
    public function logout()
    {
        Auth::guard('parceiro')->logout();
        return redirect('Parceiro/login');
    }
}
