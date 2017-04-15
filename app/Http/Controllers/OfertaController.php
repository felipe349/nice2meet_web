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
        
        if (strtolower($request->ic_status_oferta) == 'true'){
            $oferta->ic_status_oferta    =   1;
        } else {
            $oferta->ic_status_oferta    =   0;
        }
        
        return \Response::json($oferta->save());
    }
}
