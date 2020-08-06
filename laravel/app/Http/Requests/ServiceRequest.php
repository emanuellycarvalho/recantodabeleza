<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'descricao'=>'required',
            'valorServico'=>'required',
            'comissao'=>'required'
        ];
    }

    public function messages() {
        return [
            'descricao.required'=>'O campo descrição é obrigatório',
            'valorServico.required'=>'O campo valor é obrigatório',
            'comissao.required'=>'O campo comissão é obrigatório'
        ];
    }
}
