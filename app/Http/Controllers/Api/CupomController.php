<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Oferta;
use App\Models\OfertaTurista;
use App\Models\Cupom;

class CupomController extends Controller
{
    public function generateCupom(Request $request){
        $idTurista = $request['id_turista'];
        $idOferta  = $request['id_oferta'];
        $idOfertaTurista = OfertaTurista::create($request->all())->id_oferta_turista;
        Cupom::insert([
            'id_oferta_turista' => $idOfertaTurista,
            'dt_inicial_cupom' => Carbon::now(),
            'dt_final_cupom' => Carbon::now()->addDays(1),
            'cd_cupom' => str_random(6),
            'ic_validado' => 0,
            'ic_status' => 1
        ]);
        $cupom = Cupom::where('id_oferta_turista', $idOfertaTurista)->first();
        return $cupom;
    }
    
    public function getCupom(Request $request){
        $cupom = array();
        $i = 0;
        $idTurista = $request['id_turista'];
        $idOfertaTurista = OfertaTurista::where('id_turista', $idTurista)->get();
        foreach($idOfertaTurista as $idOT){
            $idOferta = Oferta::where([
                ['id_oferta', $idOT['id_oferta']],
                ['ic_status_oferta', 1]
            ])->get();
        }
        foreach($idOferta as $o){
            $idOfertaTurista = OfertaTurista::where([
                ['id_oferta', $o['id_oferta']],
                ['id_turista', $idTurista]
            ])->get();
        }
        foreach($idOfertaTurista as $idOT){
            $cupom[$i] = Cupom::where('id_oferta_turista', $idOT['id_oferta_turista'])->first();
            $i++;
        }
        return $cupom;
    }
}
