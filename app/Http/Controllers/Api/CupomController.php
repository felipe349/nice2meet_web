<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Oferta;
use App\Models\OfertaTurista;
use App\Models\Cupom;
use App\Models\Parceiro;

class CupomController extends Controller
{
    public function generateCupom(Request $request){
        $idTurista = $request['id_turista'];
        $idOferta  = $request['id_oferta'];
        $idOfertaTurista = OfertaTurista::create($request->except(['flag']))->id_oferta_turista;
        if($request['cupom'] == 1){
            Cupom::insert([
                'id_oferta_turista' => $idOfertaTurista,
                'dt_final_cupom' => Carbon::now()->addDays(1),
                'cd_cupom' => strtoupper(str_random(6)),
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
        $parceiro = array();
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
                ['dt_final_cupom', '>', Carbon::now()],
                ['ic_status', 1]
            ])->first();
            //Verifica se elemento está null
            if($cupom[$i]){
                $i++;
                $oferta[$z] = Oferta::where([
                    ['id_oferta', $idOT['id_oferta']]
                ])->first();
                $turista[$z] = Parceiro::where([
                    ['id_parceiro', $oferta[$z]->id_parceiro]
                ])->first(['nm_parceiro', 'nm_endereco']);
                $z++;
            }
        }

        //se o ultimo for null substitui
        if($cupom[$i-1]){
            $cupom[$i] = Carbon::now();
        } else {
            $cupom[$i-1] = Carbon::now();
        }

        return array($cupom, $oferta, $turista);
    }

    public function handleCupom(Request $request){
        $flag = $request['flag'];
        $idTurista = $request['id_turista'];
        if($flag == 0){
            $idOferta = $request['id_oferta'];
            $idOfertaTurista = OfertaTurista::create($request->except(['flag']))->id_oferta_turista;
            return $idOfertaTurista;
        } elseif($flag == 1){
            $i = 0;
            $idOferta = $request['id_oferta'];
            foreach($idOferta as $o){
                $idOfertaTurista = OfertaTurista::where([['id_oferta', $o],['id_turista', $idTurista]])->exists();
                if($idOfertaTurista){
                    $idOferta[$i] = 1;
                } else {
                    $idOferta[$i] = 0;
                }
                $i++;
            }
            return $idOferta;
        } elseif ($flag > 2){
            Cupom::insert([
                'id_oferta_turista' => $flag,
                'dt_final_cupom' => Carbon::now()->addDays(1),
                'cd_cupom' => strtoupper(str_random(6)),
                'ic_validado' => 0,
                'ic_status' => 1
            ]);
            $cupom = Cupom::where('id_oferta_turista', $request['flag'])->first();
            return $cupom;
        }
    }
}
