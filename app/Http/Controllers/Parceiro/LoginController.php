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
        if (Auth::guard('parceiro')->attempt(['nm_email_parceiro' => $request->input('email'), 'nm_senha_parceiro' => $request->input('password')])) {
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
