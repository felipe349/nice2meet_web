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
    public function index(){
        $quiz = Quiz::with(['pontoTuristico'])->paginate(10);
        
        return view('admin/listarQuiz')->with([
            'quiz' => $quiz
        ]);
    }
    
    public function create()
    {
        return view('admin.cadastrarQuiz')->with([
            'ponto' => PontoTuristico::getPontosTuristicos()
        ]);
    
    }
    
    public function store(Request $request)
    {
        $quiz           =   Quiz::create(['id_ponto_turistico' => $request->input('id_ponto_turistico'), 'qt_questao' => 5])->id_quiz;
        $questao        =   Questao::create($request->only('nm_questao'))->id_questao;
        $questaoQuiz    =   QuestaoQuiz::create(['id_quiz' => $quiz, 'id_questao' => $questao]);
        
        RespostaQuestao::adicionarRespostaQuestao($request->only(['ds_resposta_questao', 'ic_resposta_correta']), $questao);
        
        return redirect()->back()->withMensagem([
            'text'      =>  'Quiz cadastrado com sucesso.',
            'class'     =>  'success'
        ]);
    }
    
    public function edit(Quiz $quiz) 
    {
        return view('admin.editarQuiz')->with([
            'ponto'         =>  PontoTuristico::getPontosTuristicos(),
            'respostas'     =>  $quiz->questaoQuiz->questao->respostasQuestao,
            'quiz'          =>  $quiz,
        ]);
    }
    
    public function update(Request $request, Quiz $quiz)
    {
        $i = 0;
        $questao = QuestaoQuiz::where('id_quiz', $quiz->id_quiz)->first();
        $questao = Questao::where('id_questao', $questao->id_questao)->first();
        $questao->nm_questao = $request->nm_questao;
        $questao->save();
        
        $resposta = RespostaQuestao::where('id_questao', $questao->id_questao)->get();
        foreach($resposta as $r){
            $r->ds_resposta_questao = $request->ds_resposta_questao[$i];
            if($request->ic_resposta_correta[0]-1 == $i){
                $r->ic_resposta_correta = 1;
            } else {
                $r->ic_resposta_correta = 0;
            }
            $r->save();
            $i++;
        }
        
        return redirect()->back()->withMensagem([
                'text'      =>  'Salvo com sucesso',
                'class'     =>  'success'
            ]);
    }
    
    public function destroy(Quiz $quiz)
    {
        // Deleto as opçoes
        $quiz->questaoQuiz->questao->respostasQuestao()->delete();
        
        $id_quiz = $quiz->id_quiz;
        $id_questao = $quiz->questaoQuiz->id_questao;
        
        // Deleto o relacionamento entre questao e quiz
        $quiz->questaoQuiz()->delete();
        
        // Deleto a questao
        $questao = Questao::find($id_questao);
        if ($questao) {
            $questao->delete();
        }
        
        // Deleto o Quiz
        if (!$quiz->delete()) {
            return redirect()->back()->withMensagem([
                'class'  =>  'danger',
                'text' =>  'Selecione um quiz válido.',
            ]);
        }
        
        return redirect()->back()->withMensagem([
            'text'  =>  'Quiz deletado com sucesso.',
            'class' =>  'success',
        ]);
        return $quiz;
    }
}
