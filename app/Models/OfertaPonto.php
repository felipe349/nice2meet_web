<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfertaPonto extends Model
{
    public $timestamps = false;
    protected $table = 'tb_oferta_ponto';
    protected $primaryKey = 'id_oferta_ponto';
    protected $fillable = [
        'id_oferta_ponto', 'cd_latitude_oferta', 'cd_longitude_oferta', 'id_oferta', 'id_ponto_turistico'
    ];
    
    public function pontoTuristico()
    {
        return $this->belongsTo('App\Models\PontoTuristico', 'id_ponto_turistico', 'id_ponto_turistico');
    }
    
    public function oferta()
    {
        return $this->belongsTo('App\Models\Oferta', 'id_oferta', 'id_oferta');
    }
}
