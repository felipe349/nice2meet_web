<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CadastroQuiz;

use App\Models\Quiz;
use App\Models\Questao;
use App\Models\RespostaQuestao;
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
        $qt_questao = $request->only('qt_questao');
        $ic_resposta_correta = $request->only('ic_resposta_correta');
        $ds_resposta_questao = $request->only('ds_resposta_questao');
        
        $quiz           =   Quiz::create($request->only('qt_questao', 'id_ponto_turistico'))->id_quiz;
        $questao        =   Questao::create($request->only('nm_questao'))->id_questao;
        $questaoQuiz    =   QuestaoQuiz::create([
                                'id_quiz' => $quiz, 
                                'id_questao' => $questao
                            ]);
            
        for($i = 1; $i <= $qt_questao; $i++){
            $respostaQuestao = RespostaQuestao::create([
                    'ds_resposta_questao' => $ds_resposta_questao,
                    'ic_resposta_correta' => $this->checarIC($i, $ic_resposta_correta),
                    'id_questao'          => $questao
                ]);
        }
        
        
        
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
    
    public function checarIC($n, $correta){
        if($n == 1 && $correta == "A"){
            return 1;
        } else if($n == 2 && $correta == "B"){
            return 1;            
        } else if($n == 3 && $correta == "C"){
            return 1;
        } else if($n == 4 && $correta == "D"){
            return 1;
        } else if($n == 5 && $correta == "E"){
            return 1;
        } else {
            return 0;
        }
    }
}
