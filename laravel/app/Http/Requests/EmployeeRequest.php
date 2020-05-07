<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'nmFunc' => 'required',
            'sexo' => 'required',
            'cpf' => 'required|cpf|formato_cpf|unique:TbFuncionario,cpf', 
            'telefone' => 'required',
            'email' => 'required|unique:TbFuncionario,email',
            'senha' => 'required',
            'senha2' => 'required|same:senha',
            'cep' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'tipo' => 'min:1'
        ];
    }

    public function messages(){

        return [
            'nmFunc.required' => 'O campo "Nome" é obrigatório.',
            'sexo.required' => 'O campo "Sexo" é obrigatório.',
            'cpf.required' => 'O campo "CPF" é obrigatório.',
            'cpf.cpf' => 'O CPF não é válido',
            'cpf.formato_cpf' => 'O CPF não é válido',
            'cpf.unique' => 'CPF já cadastrado',
            'telefone.required' => 'O campo "Telefone" é obrigatório.',
            'email.required' => 'O campo "Email" é obrigatório.',
            'email.unique' => 'Email já cadastrado',
            'senha.required' => 'O campo "Senha" é obrigatório.',
            'senha2.required' => 'Confirme sua senha',
            'senha2.same' => 'As senhas não conferem',
            'cep.required' => 'O campo "CEP" é obrigatório.',
            'rua.required' => 'O campo "Rua" é obrigatório.',
            'numero.required' => 'O campo "Número" é obrigatório.',
            'bairro.required' => 'O campo "Bairro" é obrigatório.',
            'cidade.required' => 'O campo "Cidade" é obrigatório.',
            'tipo.min' => 'O campo "Tipo" é obrigatório.'
        ];
    }
}
