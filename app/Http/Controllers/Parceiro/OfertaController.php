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
    
    public function getEditarOferta(\App\Models\Oferta $oferta) {
        return view('parceiro.editarOferta');
    }
    
    public function getListarOferta(){
        $ofertas = \App\Models\Oferta::all();
        
        return view('parceiro.listagemOferta')->with([
            'ofertas'   =>  $ofertas
        ]);
    }
    
    public function getUpdateOferta(\App\Models\Oferta $oferta)
    {
        dd($oferta);
    }
}
