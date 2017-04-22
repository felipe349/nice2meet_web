<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ParceiroRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (\Auth::guard('parceiro')->check() || \Auth::guard('admin')->check());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nm_parceiro'       =>  'required',
            'email'             =>  'sometimes|required|email|unique:tb_parceiro,email',
            'cd_telefone'       =>  'required',
            'cd_latitude'       =>  'required',
            'cd_longitude'      =>  'required',
            'nm_endereco'       =>  'required',
        ];
    }
    
    public function messages()
    {
        return [
            'nm_parceiro.required'              =>  'O nome fantasia do parceiro é necessário.',
            'email.required'                    =>  'O email do parceiro é necessário.',
            'email.email'                       =>  'O email deve seguir o formato válido, por exemplo: xxx@xxx.com .',
            'email.unique'                      =>  'O email informado já existe. Por favor, tente novamente.',
            'nm_endereco.required'              =>  'O endereço do parceiro é necessário.',
            'cd_telefone.required'              =>  'O telefone é necessário',
            'cd_latitude.required'              =>  'O endereço foi preenchido incorretamente.',
            'cd_longitude.required'             =>  'O endereço foi preenchido incorretamente.',
        ];
    }
}
