<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PontoTuristico;

class PontoTuristicoController extends Controller
{
    public function getPontosTuristicos(Request $request){
        $lat = $request['lat'] + 1;
        $long = $request['long'] + 1;
        $lat2 = $request['lat'] - 1;
        $long2 = $request['long'] - 1;        
        $ponto = PontoTuristico::where([
                ['cd_latitude', '<' , $lat],
                ['cd_latitude', '>', $lat2],
                ['cd_longitude', '<', $long],
                ['cd_longitude', '>', $long2]
            ])->get();

        return $ponto;
    }
}
