<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'nmCliente'=>'required',
            'sexo'=>'required',
            'telefone'=>'required',
            'email'=>'required',
            'senha'=>'required',
            'rua'=>'required',
            'numero'=>'required',
            'bairro'=>'required',
            'cep'=>'required',
            'rg'=>'required',
            'cidade'=>'required'

        ];
    }
}
