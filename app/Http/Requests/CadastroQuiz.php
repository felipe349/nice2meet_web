<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CadastroQuiz extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_ponto_turistico'            =>  'required',
            'nm_questao'                    =>  'required|min:5',
            'ic_resposta_correta'           =>  'required',
            'ds_resposta_questao'                  =>  'required',
        ];
    }
    
    
    public function messages()
    {
        return [
            'id_ponto_turistico.required'           =>  'O nome do ponto turístico é obrigatório.',
            'nm_questao.required'                   =>  'A pergunta é obrigatória.',
            'nm_questao.min'                        =>  'A pergunta deve possuir 5 caracteres pelo menos.',
            'ic_resposta_correta.required'          =>  'A resposta correta precisa ser definida.',
            'ds_resposta_questao.required'          =>  'A resposta da alternativa A é obrigatória',
        ];
    }
}
