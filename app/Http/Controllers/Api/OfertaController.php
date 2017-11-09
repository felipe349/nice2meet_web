<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Parceiro;
use App\Models\PontoTuristico;
use App\Models\Oferta;


class OfertaController extends Controller
{
    public function getOferta(Request $request){
         $i = 0;
         $latitude = $request['lat'];
         $longitude = $request['long'];
        // $r_earth = 6678;
        // $pi = 3.14159265359;
        
        // $lat  = $latitude  + (50 / $r_earth) * (180 / $pi);
        // $long = $longitude + (50 / $r_earth) * (180 / $pi) / cos($latitude * $pi/180);
        // $lat2  = $latitude  + (-50 / $r_earth) * (180 / $pi);
        // $long2 = $longitude + (-50 / $r_earth) * (180 / $pi) / cos($latitude * $pi/180);

        // $parceiro = Parceiro::where([
        //     ['cd_latitude', '<' , $lat],
        //     ['cd_latitude', '>', $lat2],
        //     ['cd_longitude', '<', $long],
        //     ['cd_longitude', '>', $long2]
        // ])->get();
        $meters = 500;
        $coef = $meters * 0.0000089;
        $lat = $latitude + $coef;
        $long = $longitude + $coef / cos($longitude * 0.018);
        
        $meters = -500;
        $coef = $meters * 0.0000089;
        $lat2 = $latitude + $coef;
        $long2 = $longitude + $coef / cos($longitude * 0.018);
        $parceiro = Parceiro::where([
            ['cd_latitude', '<' , $lat],
            ['cd_latitude', '>', $lat2],
            ['cd_longitude', '<', $long],
            ['cd_longitude', '>', $long2]
        ])->get();
        foreach($parceiro as $p){
            $p = $p['id_parceiro'];
            $oferta[$i] = Oferta::where([
                ['id_parceiro', $p],
                ['ic_status_oferta', 1]
            ])->get();
            $i++;
        }
        return $oferta;

    }
}
