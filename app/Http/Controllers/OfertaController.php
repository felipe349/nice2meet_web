<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OfertaController extends Controller
{
    public function mudarStatusOferta(Request $request)
    {
        $oferta = \App\Models\Oferta::find($request->input('id_oferta'));
        
        if (empty($oferta)) {
            return \Response::json(false);
        }
        
        \App\Models\Oferta::where('id_parceiro', $oferta->id_parceiro)->update(['ic_status_oferta'  =>  0]);
        
        if (strtolower($request->ic_status_oferta) == 'true'){
            $oferta->ic_status_oferta    =   1;
        } else {
            $oferta->ic_status_oferta    =   0;
        }
        
        return \Response::json($oferta->save());
    }
    
    public function deletarOferta(Request $request)
    {
        $oferta         = \App\Models\Oferta::find($request->input('id_oferta'));
        
        // Precisa deletar todos os cupons de oferta relacionados com essa oferta
        $ofertaPonto    = $oferta->ofertaPonto()->delete();
        
        return \Response::json($oferta->delete());
    }
}
