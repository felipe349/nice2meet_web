<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TuristaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nm_turista'        =>  'required|min:5|max:150',
            'email'             =>  'required|email|unique:tb_turista,email',
            'password'          =>  'required|min:6|max:20',
            'dt_nascimento'     =>  'required|date',
            'cd_cpf'            =>  'required|unique:tb_turista,cd_cpf'
        ];
    }
    
    public function messages()
    {
        return [
            'nm_turista.required'       =>  'O nome do turista é obrigatório.',
            'nm_turista.min'            =>  'O nome do turista precisa de pelo menos 5 caracteres.',
            'nm_turista.max'            =>  'O nome do turista pode possuir no máximo 150 caracteres.',
            'email.required'            =>  'O email é obrigatório.',
            'email.email'               =>  'O email precisa possuir o formato xxx@xxx.com',
            'email.unique'              =>  'O email informado já está em uso',
            'dt_nascimento.required'    =>  'A data de nascimento é obrigatória.',
            'dt_nascimento.date'        =>  'A data de nascimento deve possuir formato válido.',
            'cd_cpf.required'           =>  'O CPF é obrigatório.',
            'cd_cpf.unique'             =>  'O CPF utilizado já está em uso. Por favor, tente novamente',
        ];
    }
}
