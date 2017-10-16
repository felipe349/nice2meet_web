<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Dependency Injections
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        
        return view('admin.home')->with([
            'admin'                 =>  $admin,
            'parceiros'             =>  \App\Models\Parceiro::count(),
            'turistas'              =>  \App\Models\Turista::count(),
            'cupons'                =>  \App\Models\Cupom::count(),
            'pontos_turisticos'     =>  \App\Models\PontoTuristico::where('ic_status_ponto_turistico', 1)->count()
        ]);
    }
    
    public function getDados(){
        return view('admin.meusDados');
    }
}
