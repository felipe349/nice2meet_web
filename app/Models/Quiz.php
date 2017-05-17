<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public $timestamps = false;
    protected $table = 'tb_quiz';
    protected $primaryKey = 'id_quiz';
    protected $fillable = [
        'id_quiz', 'qt_questao', 'id_ponto_turistico'
    ];
    
    public function pontuacao()
    {
        return $this->hasMany('App\Models\Pontuacao', 'id_quiz', 'id_quiz');
    }
    
    public function pontoTuristico()
    {
        return $this->belongsTo('App\Models\PontoTuristico', 'id_ponto_turistico', 'id_ponto_turistico');
    }
    
    public function questaoQuiz()
    {
        return $this->belongsTo('App\Models\QuestaoQuiz', 'id_quiz', 'id_quiz');
    }
}
