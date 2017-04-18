<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pontuacao extends Model
{
    public $timestamps = false;
    protected $table = 'tb_pontuacao';
    protected $primaryKey = 'id_pontuacao';
    protected $fillable = [
        'dt_pontuacao', 'qt_pontuacao', 'id_turista', 'id_quiz', 'id_cupom'
    ];
    
    public function turista()
    {
        return $this->belongsTo('App\Models\Turista', 'id_turista', 'id_turista');
    }
    
    public function cupom()
    {
        return $this->hasOne('App\Models\Cupom', 'id_cupom', 'id_cupom');
    }
    
    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz', 'id_quiz', 'id_quiz');
    }
}
