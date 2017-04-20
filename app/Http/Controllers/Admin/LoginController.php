<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Dependency injections
use Auth;

class LoginController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }
    
    public function makeLogin(\App\Http\Requests\LoginRequest $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // Authentication passed...
            return redirect()->intended('Admin/');
            
        }
        return redirect()->back()->withErrors(['Nome de usuário ou senha preenchidos incorretamente.']);
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('Admin/login');
    }
}
