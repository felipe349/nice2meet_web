<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Quiz;
use App\Models\Questao;
use App\Models\QuestaoQuiz;
use App\Models\RespostaQuestao;

class QuizController extends Controller
{
    public function getQuiz(Request $request){
        $alternativas = [];
        $i = 1;
        $idPonto = $request['id_ponto_turistico'];
        $quiz = Quiz::where('id_ponto_turistico', $idPonto)->first();
        $questaoQuiz = QuestaoQuiz::where('id_quiz', $quiz['id_quiz'])->first();
        $questao = Questao::where('id_questao', $questaoQuiz['id_questao'])->first();
        $alternativas[0] = $questao['nm_questao'];
        $respostaQuestao = RespostaQuestao::where('id_questao', $questaoQuiz['id_questao'])->get();
        foreach ($respostaQuestao as $rQ){
            $alternativas[$i] = $rQ['ds_resposta_questao'];
            if($rQ['ic_resposta_correta'] == 1){
                $alternativas[6] = $i;
            }
            $i++;
        }
        return $alternativas;
        
        
        
    }
}
