<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// Models
use App\Models\Oferta;

class OfertaController extends Controller
{
    public function mudarStatusOferta(Request $request)
    {
        $oferta = Oferta::find($request->input('id_oferta'));
        
        if (empty($oferta)) {
            return \Response::json(false);
        }
        
        return \Response::json(Oferta::mudarStatusOferta($oferta, $request->ic_status_oferta));
    }
    
    public function deletarOferta(Request $request)
    {
        $oferta         = Oferta::find($request->input('id_oferta'));
        
        return \Response::json(Oferta::deleteOferta($oferta));
    }
}
