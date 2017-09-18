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
    public function create()
    {
        return view('admin.cadastrarPonto');
    }
    
    public function store(Request $request)
    {
        $ponto_turistico = PontoTuristico::create($request->all());
        
        if (!$ponto_turistico) {
            return redirect()->back()->withInput()->withErrors(['Por favor, tente novamente']);
        }
        
        return redirect()->back()->withMensagem([
            'text'      =>  'Ponto turístico cadastrado com sucesso.',
            'class'     =>  'success'
        ]);
    }
    
    public function edit(PontoTuristico $ponto)
    {
        return view('admin.editarPonto')->with([
            'ponto'     =>      $ponto
        ]);
    }
    
    public function update(PontoTuristico $ponto, CadastroPontoTuristico $request)
    {
        $dados      =   $request->except(['_token', '_method']);
        
        if (!PontoTuristico::atualizaPontoTuristico($ponto, $dados)) {
            return redirect()->back()->withInput($request->all())->withMensagem([
                'class'     =>      'error',
                'text'      =>      'Tente novamente.'
            ]);
        }
        
        return redirect()->back()->withMensagem([
            'class'     =>      'success',
            'text'      =>      'Ponto turístico atualizado com sucesso.'
        ]);
    }
    
    public function index()
    {
        $pontos_turisticos  =   PontoTuristico::getPontosTuristicos(null, 10);
        
        return view('admin.listarPonto')->with([
            'pontos_turisticos'     =>      $pontos_turisticos,
        ]);
    }
}
