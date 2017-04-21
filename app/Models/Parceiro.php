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
        'nm_parceiro', 'email', 'dt_registro', 'cd_telefone', 'cd_latitude', 'cd_longitude'
    ];
    
    public function ofertas()
    {
        return $this->hasMany('App\Models\Oferta', 'id_parceiro', 'id_parceiro');
    }
    
    public function cupom()
    {
        return $this->hasMany('App\Models\Cupom', 'id_parceiro', 'id_parceiro');
    }
    
    public static function getParceiro(){
        
    }
    
}
