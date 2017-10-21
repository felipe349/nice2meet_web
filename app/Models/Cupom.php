<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    public $timestamps = false;
    protected $table = 'tb_cupom';
    protected $primaryKey = 'id_cupom';
    protected $fillable = [
        'id_oferta_turista', 'dt_maximo_cupom', 'cd_cupom', 'ic_status', 'ic_validado'
    ];
    
    protected $dates = ['dt_maximo_cupom'];
}
