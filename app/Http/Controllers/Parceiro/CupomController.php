<?php

namespace App\Http\Controllers\Parceiro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Dependency Injections
use \Carbon\Carbon;

class CupomController extends Controller
{
    public function index()
    {
        Carbon::setLocale('pt-BR');
        $cupons = \App\Models\Cupom::getCupomPorParceiro(\Auth::guard('parceiro')->user()->id_parceiro);
        
        return view('parceiro.listagemCupom')->with([
            'cupons'    =>  $cupons
        ]);
    }
    
    public function edit()
    {
        return view('parceiro.editarOferta');
    }
    
    public function getValidarCupom()
    {
        return view('parceiro.validarCupom');
    }
}
