<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CadastroQuiz;

use App\Models\Quiz;
use App\Models\Questao;
use App\Models\QuestaoQuiz;
use App\Models\PontoTuristico;

class QuizController extends Controller
{
    public function create(){
        $pontos_turisticos  =   PontoTuristico::getPontosTuristicos();
        
        return view('admin/cadastrarQuiz')->with([
        'ponto' => $pontos_turisticos
        ]);
        
    }
    
    public function store(CadastroQuiz $request){
        $quiz = Quiz::create($request->only('qt_questao', 'id_ponto_turistico'))->id_quiz;
        $questao = Questao::create($request->only('nm_questao'))->id_questao;
        $questaoQuiz = QuestaoQuiz::create(['id_quiz' => $quiz, 
                                            'id_questao' => $questao]);
        
        
        if (!$quiz) {
            return redirect()->back()->withInput()->withErrors(['Por favor, tente novamente']);
            
        }
        
        return redirect()->back()->withMensagem([
            'text'      =>  'Quiz cadastrado com sucesso.',
            'class'     =>  'success'
        ]);
    }
    
    public function index(){
        // Retorna todos os quiz
        $quiz = Quiz::with(['pontoTuristico'])->paginate(10);
        
        //return $quiz->first()->pontoTuristico->nm_ponto_turistico;
        return view('admin/listarQuiz')->with([
        'quiz' => $quiz
        ]);
    }
    
    public function edit(Quiz $quiz) {
        return $quiz->pontoTuristico->nm_ponto_turistico;
    }
}
