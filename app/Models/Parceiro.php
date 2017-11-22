<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Parceiro extends Authenticatable
{
    public $timestamps = false;
    protected $table = 'tb_parceiro';
    protected $primaryKey = 'id_parceiro';
    protected $fillable = [
        'id_parceiro', 'nm_parceiro', 'email', 'password', 'cd_telefone', 'cd_latitude', 'cd_longitude', 'nm_endereco'
    ];
    
    public function ofertas()
    {
        return $this->hasMany('App\Models\Oferta', 'id_parceiro', 'id_parceiro');
    }
    
    public function cupom()
    {
        return $this->hasMany('App\Models\Cupom', 'id_parceiro', 'id_parceiro');
    }
    
    public static function getParceiros($paginate = null)
    {
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
        $parceiro->timestamps = false;
        $parceiro->fill($dados);
        return $parceiro->save();
        // return $parceiro->update($dados);
    }
    
    public static function criarParceiro($dados)
    {
        $dados['cd_telefone']   =   preg_replace("/[^0-9]/", "", $dados['cd_telefone']);
        return self::create($dados);
    }
}
