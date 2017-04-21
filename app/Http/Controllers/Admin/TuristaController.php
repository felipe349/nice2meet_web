<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Turista;

class TuristaController extends Controller
{
    public function getListarTurista(){
        $turistas = Turista::getTuristas(10);
        
        return view('admin.listarTurista')->with([
            'turistas'  =>  $turistas
        ]);
    }
}
