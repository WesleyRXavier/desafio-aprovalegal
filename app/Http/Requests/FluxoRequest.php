<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FluxoRequest extends FormRequest
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
            'documento'=>'required',
            'setorOrigem'=>'required',
            'setorDestino'=>'required|different:setorOrigem',
            'funcOrigem'=>'required',
            'funcDestino'=>'required|different:funcOrigem',
            'status'=>'required|in:Andamento,Finalizado',
        ];
    }

    public function messages(){

        return  [
            'required' => '   :attribute obrigatorio.',
            'different' => '   :attribute deve ser diferente da Origem.'

        ];


    }
}
