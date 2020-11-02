<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmpresaRequest extends FormRequest
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
        // dd($this->empresa);

        return [
            'razaoSocial' => 'required|min:3|max:191',
            'nomeFantasia' => 'required|min:3|max:191',
            'cnpj' => 'required|min:14|unique:empresas,cnpj,' . $this->empresa


        ];
    }

    public function messages()
    {

        return [
            'required' => '   :attribute obrigatorio.',
            'min' => ' O campo de ter no minimo :min caracteres.',
            'max' => ' O campo de ter no maximo :max caracteres.',
            'unique' => ' Este :attribute ja esta em uso.',

        ];

    }
}
