<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Form requests
use App\Http\Requests\CadastroPontoTuristico;

// Models
use App\Models\PontoTuristico;
use App\Models\Quiz;
use App\Models\QuestaoQuiz;

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
    
    public function destroy(PontoTuristico $ponto){
        
        $id = $ponto->id_ponto_turistico;
        $quiz = Quiz::where('id_ponto_turistico', $id)->get();
        
        foreach ($quiz as $q){
            QuestaoQuiz::where('id_quiz', $q->id_quiz)->delete();
        }
        
        $quiz = Quiz::where('id_ponto_turistico', $id)->delete();
        
        $ponto->delete();
        
        return redirect()->back()->withMensagem([
            'text'  =>  'Quiz deletado com sucesso.',
            'class' =>  'success',
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
