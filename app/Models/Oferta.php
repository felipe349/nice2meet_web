<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    public $timestamps = false;
    protected $table = 'tb_oferta';
    protected $primaryKey = 'id_oferta';
    protected $fillable = [
        'id_oferta', 'nm_oferta', 'ds_oferta', 'ic_status_oferta', 'id_parceiro'
    ];
    
    //protected $dates = ['created_at', 'updated_at'];
    
    public function parceiro()
    {
        return $this->belongsTo('App\Models\Parceiro', 'id_parceiro', 'id_parceiro');
    }
    
    public function ofertaPonto()
    {
        return $this->hasMany('App\Models\OfertaPonto', 'id_oferta', 'id_oferta');
    }
    
    // Models
    public static function deleteOferta(Oferta $oferta)
    {
        $oferta->ofertaPonto()->delete();
        return $oferta->delete();
    }
    
    public static function mudarStatusOferta(Oferta $oferta, $ic_status_oferta)
    {
        if (strtolower($ic_status_oferta) == 'true'){
            self::where('id_parceiro', $oferta->id_parceiro)->update(['ic_status_oferta'  =>  0]);
            $oferta->ic_status_oferta    =   1;
        } else {
            $oferta->ic_status_oferta    =   0;
        }
        
        return \Response::json($oferta->save());
    }
    
    public static function getOfertas($ic_status = null, $paginate = null)
    {
        $ofertas        =   self::orderBy('id_oferta');
        
        if (!is_null($ic_status)) {
            $ofertas    =   $ofertas->where('ic_status_oferta', $ic_status);
        }
        
        if (!is_null($paginate)) {
            return $ofertas->paginate($paginate);
        }
        
        return $ofertas->get();
    }
}
