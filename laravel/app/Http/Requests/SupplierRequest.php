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
            'nmFornecedor' => 'required',
            'telefone' => 'required',
            'cnpj' => 'required',
            'email' => 'required'
        ];
    }

    public function messages(){

        return [
            'nmFornecedor.required' => 'O campo "Nome" é obrigatório.',
            'telefone.required' => 'O campo "Telefone" é obrigatório.',
            'cnpj.required' => 'O campo "CNPJ" é obrigatório.',
            'email.required' => 'O campo "Email" é obrigatório.'
        ];
    }
}
