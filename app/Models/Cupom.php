<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    public $timestamps = false;
    protected $table = 'tb_cupom';
    protected $primaryKey = 'id_cupom';
    protected $fillable = [
        'dt_maximo_cupom', 'cd_cupom', 'id_parceiro'
    ];
    
    
}
