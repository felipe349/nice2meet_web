<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Form requests
use App\Http\Requests\CadastroPontoTuristico;

// Models
use App\Models\PontoTuristico;

class PontoTuristicoController extends Controller
{
    public function getCadastrarPonto(){
        return view('admin.cadastrarPonto');
    }
    
    public function cadastrarPontoTuristico(CadastroPontoTuristico $request)
    {
        $ponto_turistico = PontoTuristico::create($request->except(['_token']));
        
        if (!$ponto_turistico) {
            return redirect()->back()->withInput()->withErrors(['Por favor, tente novamente']);
            
        }
        
        return redirect()->back()->withMensagem([
            'text'      =>  'Ponto turístico cadastrado com sucesso.',
            'class'     =>  'success'
        ]);
    }
    
    public function getEditarPonto(){
        return view('admin.editarPonto');   
    }
    
    public function getListarPonto(){
        $pontos_turisticos  =   PontoTuristico::getPontosTuristicos(null, 10);
        
        return view('admin.listarPonto')->with([
            'pontos_turisticos'     =>      $pontos_turisticos,
        ]);
    }
}
