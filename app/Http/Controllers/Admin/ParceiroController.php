<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ParceiroController extends Controller
{
    public function getCadastrarParceiro(){
        return view('admin.cadastrarParceiro');
    }
    
    public function getEditarParceiro(){
        return view('admin.editarParceiro');
    }
    
    public function getListarParceiro(){
        return view('admin.listarParceiro');
    }
}
