<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\OfertaTurista;
use App\Models\Cupom;

class CupomController extends Controller
{
    public function getCupom(Request $request){
        $idTurista = $request['id_turista'];
        $idOferta  = $request['id_oferta'];
        $idOfertaTurista = OfertaTurista::create($request->all())->id_oferta_turista;
        Cupom::create(
            ['id_oferta_turista' => $idOfertaTurista],
            ['dt_maximo_cupom' => Carbon::now()],
            ['cd_cupom' => str_random(6)],
            ['ic_validado' => 0],
            ['ic_status' => 1]
        );
        $cupom = Cupom::where('id_oferta_turista', $idOfertaTurista)->first();
        return $cupom;
    }
}
