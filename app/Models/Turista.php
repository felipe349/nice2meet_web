<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Turista extends Authenticatable
{
    public $timestamps = false;
    protected $table = 'tb_turista';
    protected $primaryKey = 'id_turista';
    protected $fillable = [
        'nm_turista', 'email', 'dt_registro', 'dt_nascimento', 'cd_cpf'
    ];
    
    // Defina suas datas aqui para ver a magia acontecer
    protected $dates = ['dt_registro', 'dt_nascimento'];
    
    public function pontuacao()
    {
        return $this->hasMany('App\Models\Pontuacao', 'id_turista', 'id_turista');
    }
    
    // Método que retorna os turistas
    public static function getTuristas($paginate = null)
    {
        // Se o paginate for diferente de nulo, é sinal que estamos listando. e.g getTuristas(10)
        if (!is_null($paginate)) {
            return self::paginate($paginate);
        }
        
        return self::all();
    }
    
    // Responsável por criar um novo objeto do tipo turista
    public static function createTurista($dados)
    {
        return self::create([
            'nm_turista'    =>  $dados['nm_turista'],
            'email'         =>  $dados['email'],
            'password'      =>  bcrypt($dados['password']),
            'cd_cpf'        =>  preg_replace("/[^0-9]/", "", $dados['cd_cpf']),
        ]);
        
    }
}
