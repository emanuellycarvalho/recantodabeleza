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
            'cliente'  => 'required|min:1',
            'total' => 'required|min:1',
        ];
    }

    public function messages(){

        return [
            'data.required' => 'O campo "Data" é obrigatório.',
            'inicio.required' => 'O campo "Início" é obrigatório.',
            'cliente.min' => 'É necessário selecionar um cliente.',
            'cliente.required' => 'É necessário selecionar um cliente.',
            'total.required' => 'O valor não pode ficar em branco.',
            'total.min' => 'O valor não pode ficar em branco.'
        ];
    }
}
