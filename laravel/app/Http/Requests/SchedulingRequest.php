<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchedulingRequest extends FormRequest
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
            'data' => 'required',
            'inicio' => 'required',
            'cliente'  => 'min:1',
            //'servicos'  => 'required',
            //'funcionarios'  => 'required'
        ];
    }

    public function messages(){

        return [
            'data.required' => 'O campo "Data" é obrigatório.',
            'inicio.required' => 'O campo "Início" é obrigatório.',
            'cliente.min' => 'É necessário selecionar um cliente.'
            //'servicos.required' => 'É necessário selecionar ao menos um servico.',
            //'funcionarios.required' => 'É necessário selecionar ao menos um funcionário.'
        ];
    }
}
