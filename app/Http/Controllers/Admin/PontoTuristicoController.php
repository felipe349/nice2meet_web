<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PontoTuristicoController extends Controller
{
    public function getCadastrarPonto(){
        return view('admin.cadastrarPonto');
    }
}
