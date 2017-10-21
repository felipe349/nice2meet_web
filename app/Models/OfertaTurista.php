<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfertaTurista extends Model
{
    public $timestamps = false;
    protected $table = 'tb_oferta_turista';
    protected $primaryKey = 'id_oferta_turista';
    protected $fillable = [
        'id_oferta', 'id_turista'
    ];
    
    public function turista()
    {
        return $this->belongsTo('App\Models\Turista', 'id_turista', 'id_turista');
    }
    
    public function oferta()
    {
        return $this->belongsTo('App\Models\Oferta', 'id_oferta', 'id_oferta');
    }
}
