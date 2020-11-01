<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
            'nome'=>'required|min:3|max:191',
            'email'=>'required|email|max:191',
            'cpf'=>'required|min:11|max:14',

        ];
    }

    public function messages(){

        return  [
            'required' => '   :attribute obrigatorio.',
            'min' => ' O campo de ter no minimo :min caracteres.',
            'max' => ' O campo de ter no maximo :max caracteres.',
            'unique' => ' Este CNPJ ja esta em uso.',

        ];


    }
}
