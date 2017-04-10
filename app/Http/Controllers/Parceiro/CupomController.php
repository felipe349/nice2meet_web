<?php

namespace App\Http\Controllers\Parceiro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CupomController extends Controller
{
    public function getListarCupom(){
        return view('parceiro.listagemCupom');        
    }
    
    public function getEditarOferta(){
        return view('parceiro.editarOferta');
    }
    
    public function getValidarCupom(){
        return view('parceiro.validarCupom');
    }
}
