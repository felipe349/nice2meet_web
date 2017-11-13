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
        $idOfertaTurista = OfertaTurista::create($request->except(['flag']))->id_oferta_turista;
        if($request['cupom'] = 1){
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
    }
    
    public function getCupom(Request $request){
        $cupom = array();
        $oferta = array();
        $idOferta = array();
        $idOfertaTurista = array();
        $i = 0;
        $z = 0;
        $idTurista = $request['id_turista'];
        $idOfertaTurista = OfertaTurista::where('id_turista', $idTurista)->get();
        foreach($idOfertaTurista as $idOT){
            $idOferta[$i] = Oferta::where([
                ['id_oferta', $idOT['id_oferta']],
                ['ic_status_oferta', 1]
            ])->first();
            $i++;
        }
        $i = 0;
        foreach($idOferta as $o){
            $idOfertaTurista[$i] = OfertaTurista::where([
                ['id_oferta', $o['id_oferta']],
                ['id_turista', $idTurista]
            ])->first();
            $i++;
        }
        $i = 0;
        foreach($idOfertaTurista as $idOT){
            $cupom[$i] = Cupom::where([
                ['id_oferta_turista', $idOT['id_oferta_turista']],
                ['dt_final_cupom', '>', Carbon::now()]
            ])->first();
            //Verifica se elemento está null
            if($cupom[$i]){
                $i++;
                $oferta[$z] = Oferta::where([
                    ['id_oferta', $idOT['id_oferta']]
                ])->first();
                $z++;
            } 
        }

        //se o ultimo for null substitui
        if($cupom[$i-1]){
            $cupom[$i] = Carbon::now();
        } else {
            $cupom[$i-1] = Carbon::now();
        }
        
        return array($cupom, $oferta);
    }
    
    public function handleCupom(Request $request){
        $flag = $request['flag'];
        $idTurista = $request['id_turista'];
        $idOferta = $request['id_oferta'];
        if($flag == 0){
            $idOfertaTurista = OfertaTurista::where([
                ['id_oferta', $idOferta],
                ['id_turista', $idTurista]
            ])->count();
            if($idOfertaTurista > 0){
                return 1;
            }
            $idOfertaTurista = OfertaTurista::create($request->except(['flag']))->id_oferta_turista;
            return $idOfertaTurista;
        } elseif ($flag != 0){
            Cupom::insert([
                'id_oferta_turista' => $flag,
                'dt_inicial_cupom' => Carbon::now(),
                'dt_final_cupom' => Carbon::now()->addDays(1),
                'cd_cupom' => str_random(6),
                'ic_validado' => 0,
                'ic_status' => 1
            ]);
            $cupom = Cupom::where('id_oferta_turista', $request['flag'])->first();
            return $cupom;
        }
    }
}
