<?php

namespace App\Http\Controllers\Parceiro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OfertaController extends Controller
{
    public function getCadastrarOferta(){
        return view('parceiro.cadastrarOferta');        
    }
    
    public function getEditarOferta(){
        return view('parceiro.editarOferta');
    }
}
