<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    public $timestamps = false;
    protected $table = 'tb_cupom';
    protected $primaryKey = 'id_cupom';
    protected $fillable = [
        'dt_maximo_cupom', 'cd_cupom', 'id_parceiro', 'ic_status', 'ic_validado'
    ];
    
    protected $dates = ['dt_maximo_cupom'];
    
    public static function getCupomPorParceiro($id_parceiro)
    {
        return self::where(['id_parceiro'   =>   $id_parceiro, 'ic_validado'    =>  1, 'ic_status'  =>  1])->get();
    }
    
    public function pontuacao()
    {
        return $this->belongsTo('App\Models\Pontuacao', 'id_cupom', 'id_cupom');
    }
}
