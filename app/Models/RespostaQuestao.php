<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RespostaQuestao extends Model
{
    public $timestamps = false;
    protected $table = 'tb_resposta_questao';
    protected $primaryKey = 'id_resposta_questao';
    protected $fillable = [
        'id_resposta_questao', 'ds_resposta_questao', 'ic_resposta_questao', 'id_questao'
    ];
    
    public function questao()
    {
        return $this->belongsTo('App\Models\Questao', 'id_questao', 'id_questao');
    }
    
    public static function adicionarRespostaQuestao($dados, $id_questao)
    {
        for($i = 0; $i < count($dados['ds_resposta_questao']); $i++){
            self::create([
                'ds_resposta_questao' => $dados['ds_resposta_questao'][$i],
                'ic_resposta_correta' => ($dados['ic_resposta_correta'][0] == ($i+1)),
                'id_questao'          => $id_questao
            ]);
        }
    }
}
