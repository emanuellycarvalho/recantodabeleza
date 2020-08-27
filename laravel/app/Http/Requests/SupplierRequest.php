<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'nome' => 'required',
            'telefone' => 'required',
            'cnpj' => 'required|cnpj|formato_cnpj', //composer require geekcom/validator-docs
            'email' => 'required'
        ];
    }

    public function messages(){

        return [
            'nome.required' => 'O campo "Nome" é obrigatório.',
            'telefone.required' => 'O campo "Telefone" é obrigatório.',
            'email.required' => 'O campo "Email" é obrigatório.',
            'cnpj.required' => 'O campo "CNPJ" é obrigatório.',
            'cnpj.cnpj' => 'O CNPJ não é válido',
            'cnpj.formato_cnpj' => 'O CNPJ não é válido'
        ];
    }
}
