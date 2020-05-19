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
            'nomeFuncao' => 'required|unique:TbTipoFuncionario,nmFuncao',
            'salarioBase' => 'required|min:1'
        ];
    }

    public function messages(){

        return [
            'nomeFuncao.required' => 'O campo "Nome" é obrigatório.',
            'nomeFuncao.unique' => 'Já existe um tipo de mesmo nome.',
            'salarioBase.required' => 'O campo "Salario Base" é obrigatório',
            'salarioBase.min' => 'O valor mínimo é R$1,00'
        ];
    }
}
