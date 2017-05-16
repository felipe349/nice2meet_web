<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    public $timestamps = false;
    protected $table = 'tb_questao';
    protected $primaryKey = 'id_questao';
    protected $fillable = [
        'id_questao', 'nm_questao'
    ];
    
    /*public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz', 'id_quiz', 'id_quiz');
    }*/
    
    public function respostaQuestao()
    {
        return $this->hasMany('App\Models\RespostaQuestao', 'id_questao', 'id_questao');
    }
}
