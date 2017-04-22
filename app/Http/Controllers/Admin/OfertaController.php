<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Models
use App\Models\Oferta;

class OfertaController extends Controller
{
    public function index()
    {
        $ofertas    =   Oferta::getOfertas(true, 10);
        
        return view('admin.listarOfertas')->with([
            'ofertas'   =>  $ofertas
        ]);
    }
}
