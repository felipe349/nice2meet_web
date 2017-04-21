<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TuristaController extends Controller
{
    public function getListarTurista(){
        $turistas = '';
        
        return view('admin.listarTurista')->with([
            'turistas'  =>  $turistas
        ]);
    }
}
