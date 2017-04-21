<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turista extends Model
{
    public $timestamps = false;
    protected $table = 'tb_turista';
    protected $primaryKey = 'id_turista';
    protected $fillable = [
        'nm_turista', 'email', 'dt_registro', 'dt_nascimento', 'cd_cpf'
    ];
    
    public function pontuacao()
    {
        return $this->hasMany('App\Models\Pontuacao', 'id_turista', 'id_turista');
    }
    
    // Método que retorna os turistas
    public function getTuristas()
    {
        
    }
}
