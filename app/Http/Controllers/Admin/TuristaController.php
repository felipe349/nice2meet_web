<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\TuristaRequest;

use App\Models\Turista;

class TuristaController extends Controller
{
    public function index(){
        $turistas = Turista::getTuristas(10);
        
        return view('admin.listarTurista')->with([
            'turistas'  =>  $turistas
        ]);
    }
    
    public function store(TuristaRequest $request)
    {
        $turista = new Turista;
        
        $turista->fill($request->all());
        return $turista->save();
    }
}
