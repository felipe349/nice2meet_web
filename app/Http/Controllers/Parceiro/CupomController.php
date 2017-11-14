<?php

namespace App\Http\Controllers\Parceiro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Dependency Injections
use \Carbon\Carbon;
use Auth;

// Models
use App\Models\Cupom;
use App\Models\OfertaTurista;
use App\Models\Oferta;

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
        $idParceiro = Auth::guard('parceiro')->user()->id_parceiro;
        $cdCupom = $request['cd_cupom'];
        $cupom = Cupom::where([
                ['cd_cupom', $cdCupom],
                ['ic_validado', 0],
                ['ic_status', 1]
            ])->first();
        
        if(!$cupom){
            return redirect()->back()->withInput()->withMensagem([
                'class'     =>  'danger',
                'text'      =>  'O cupom informado é inválido.'
            ]);
        } else {
            $ofertaT = OfertaTurista::where('id_oferta_turista', $cupom['id_oferta_turista'])->pluck('id_oferta');
            $ofertaT = Oferta::where('id_oferta', $ofertaT)->pluck('id_parceiro');
            
            if($ofertaT[0] == $idParceiro){
                $cupom->ic_validado = 1;
                $cupom->ic_status = 0;
                $cupom->save();
                return redirect()->back()->withInput()->withMensagem([
                    'class'     =>  'success',
                    'text'      =>  'O cupom foi validado com sucesso.'
                ]);
            } else {
                return redirect()->back()->withInput()->withMensagem([
                    'class'     =>  'danger',
                    'text'      =>  'O cupom informado pertence a outro parceiro.'
                ]);
            }
        }
    }
}
