<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Parceiro;

class ParceiroController extends Controller
{
    public function create()
    {
        return view('admin.cadastrarParceiro');
    }
    
    public function edit()
    {
        return view('admin.editarParceiro');
    }
    
    public function index()
    {
        $parceiros = Parceiro::getParceiros(10);
        
        return view('admin.listarParceiro')->with([
            'parceiros' => $parceiros
        ]);
    }
}
