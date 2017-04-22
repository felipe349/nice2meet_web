<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PontoTuristico extends Model
{
    // public $timestamps = false;
    protected $table = 'tb_ponto_turistico';
    protected $primaryKey = 'id_ponto_turistico';
    protected $fillable = [
        'id_ponto_turistico', 'nm_ponto_turistico', 'ds_ponto_turistico', 'ic_status_ponto_turistico', 'cd_latitude', 'cd_longitude', 'nm_endereco_ponto_turistico'
    ];
    
    // Relacionamentos
    public function quiz()
    {
        return $this->hasOne('App\Models\Quiz', 'id_quiz', 'id_quiz');
    }
    
    public function ofertaPonto()
    {
        return $this->hasMany('App\Models\OfertaPonto', 'id_oferta_ponto', 'id_oferta_ponto');
    }
    
    
    // Métodos DAO
    public static function getPontosTuristicos($ic_status = null, $paginate = null)
    {
        $pontos = self::orderBy('created_at', 'desc');
        if (!is_null($ic_status)) {
            $pontos = $pontos->where('ic_status_ponto_turistico', $ic_ativo);
        }
        
        if (!is_null($paginate)) {
            return $pontos->paginate($paginate);
        }
        
        return $pontos->get();
    }
    
    public static function atualizaPontoTuristico(PontoTuristico $ponto, $dados)
    {
        $ponto->fill($dados);
        $ponto->ic_status_ponto_turistico   =   !empty($dados['ic_status_ponto_turistico']);
        
        return $ponto->save();
    }
    
    public static function deletePontoTuristico($id_ponto_turistico)
    {
        // Para que possa ser deletado, é necessário fazer com que o oferta_ponto e tb_quiz não se relacionem com este índice.
    }
}
