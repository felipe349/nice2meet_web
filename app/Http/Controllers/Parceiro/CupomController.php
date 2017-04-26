<?php

namespace App\Http\Controllers\Parceiro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Dependency Injections
use \Carbon\Carbon;

// Models
use App\Models\Cupom;

class CupomController extends Controller
{
    public function index()
    {
        Carbon::setLocale('pt-BR');
        $cupons = Cupom::getCupomPorParceiro(\Auth::guard('parceiro')->user()->id_parceiro);
        
        
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
    
    public function validarCupom(Request $request)
    {
        if (!Cupom::validarCupom($request->input('cd_cupom'))) {
            return redirect()->back()->withInput()->withMensagem([
                'class'     =>  'danger',
                'text'      =>  'O cupom informado é inválido.'
            ]);
        }
        
        return redirect()->back()->withInput()->withMensagem([
            'class'     =>  'success',
            'text'      =>  'O cupom foi validado com sucesso.'
        ]);
    }
}
