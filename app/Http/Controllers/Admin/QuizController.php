<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Quiz;

class QuizController extends Controller
{
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
