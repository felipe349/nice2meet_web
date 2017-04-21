<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CadastroPontoTuristico extends Request
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
            'nm_ponto_turistico'            =>  'required|min:5',
            'ds_ponto_turistico'            =>  'required|min:5',
            'cd_latitude'                   =>  'required',
            'cd_longitude'                  =>  'required',
            'nm_endereco_ponto_turistico'   =>  'required'
        ];
    }
    
    
    public function messages()
    {
        return [
            'nm_ponto_turistico.required'           =>  'O nome do ponto turístico é obrigatório.',
            'nm_ponto_turistico.min'                =>  'O nome do ponto turístico deve possuir 5 caracteres pelo menos.',
            'ds_ponto_turistico.required'           =>  'A descrição do ponto turístico é obrigatório.',
            'ds_ponto_turistico.min'                =>  'A descrição do ponto turístico deve possuir 5 caracteres pelo menos.',
            'cd_latitude.required'                  =>  'Latitude é obrigatória.',
            'cd_longitude.required'                 =>  'Longitude é obrigatória.',
            'nm_endereco_ponto_turistico.required'  =>  'O endereço do ponto turístico é obrigatório.'
        ];
    }
}
