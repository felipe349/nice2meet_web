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
        $cupons = array();
        $idParceiro = Auth::guard('parceiro')->user()->id_parceiro;
        $oferta = Oferta::where('id_parceiro', $idParceiro)->get();
        $ofertaT = array();
        $i = 0;
        
        foreach ($oferta as $o) {
            $ofertaT[$i] = OfertaTurista::where('id_oferta', $o['id_oferta'])->get();
            foreach($ofertaT[$i] as $o2){
                if(!isset($o2->id_oferta)){
                     array_pop($ofertaT);
                     $i--;
                }
            }
            $i++;
        }
        $i = 0;
        foreach ($ofertaT as $oT) {
            foreach ($oT as $oT2) {
                $cupons[$i] = Cupom::where('id_oferta_turista', $oT2['id_oferta_turista'])->first();
                $i++;
            }
        }
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
        $cdCupom = strtoupper($request['cd_cupom']);
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
