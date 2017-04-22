<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Parceiro extends Authenticatable
{
    protected $table = 'tb_parceiro';
    protected $primaryKey = 'id_parceiro';
    protected $fillable = [
        'nm_parceiro', 'email', 'cd_telefone', 'cd_latitude', 'cd_longitude', 'nm_endereco'
    ];
    
    protected $dates = ['created_at', 'updated_at'];
    
    public function ofertas()
    {
        return $this->hasMany('App\Models\Oferta', 'id_parceiro', 'id_parceiro');
    }
    
    public function cupom()
    {
        return $this->hasMany('App\Models\Cupom', 'id_parceiro', 'id_parceiro');
    }
    
    public static function getParceiros($paginate = null){
        if(!is_null($paginate)){
            return self::paginate($paginate);
        }
        
        return self::all();
    }
    
    public static function atualizaParceiro(Parceiro $parceiro, $dados)
    {
        if (array_key_exists('cd_telefone', $dados)) {
            $dados['cd_telefone']   =   preg_replace("/[^0-9]/", "", $dados['cd_telefone']);
        }
        
        return $parceiro->update($dados);
    }
    
}
