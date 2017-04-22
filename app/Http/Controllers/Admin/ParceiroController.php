<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Parceiro;

class ParceiroController extends Controller
{
    public function getCadastrarParceiro(){
        return view('admin.cadastrarParceiro');
    }
    
    public function getEditarParceiro(){
        return view('admin.editarParceiro');
    }
    
    public function getListarParceiro(){
        $parceiros = Parceiro::getParceiros(10);
        
        return view('admin.listarParceiro')->with([
                'parceiros' => $parceiros
            ]);
    }
}
