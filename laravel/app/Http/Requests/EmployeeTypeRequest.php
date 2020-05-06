<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeTypeRequest extends FormRequest
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
            'nmFuncao' => 'required',
            'salarioBase' => 'required|min:1'
        ];
    }

    public function messages(){

        return [
            'nmFuncao.required' => 'O campo "Nome" é obrigatório.',
            'salarioBase.required' => 'O campo "Salario Base" é obrigatório',
            'salarioBase.min' => 'O valor mínimo é R$1,00'
        ];
    }
}
