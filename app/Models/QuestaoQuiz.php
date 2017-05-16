<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestaoQuiz extends Model
{
    public $timestamps = false;
    protected $table = 'tb_questao_quiz';
    protected $primaryKey = 'id_questao_quiz';
    protected $fillable = [
        'id_questao_quiz','id_quiz', 'id_questao'
    ];
    
}
