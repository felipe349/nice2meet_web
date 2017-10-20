<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Cupom;

class CupomController extends Controller
{
    public function getCupom(Request $request){
        $idTurista = $request['id_turista'];
        $idParceiro = $request['id_parceiro'];
        $cupom = Cupom::create($idTurista, Carbon::now(), str_random(6), 0, 1, $idParceiro);
    }
}
