<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
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
            'valorFinal' => 'min:1|required',
            'cliente' => 'required',
            'situacao' => 'required',
            //'cdFuncionario' => 'required',
            'tipoPagamento' => 'required',
            'parcelas' => 'min:1|max:12|required'
        ];
    }

    public function messages(){

        return [
            'data.required' => 'O campo Data é obrigatório.',
            'valorFinal.required' => 'O valor total é obrigatório.',
            'valorTotal.min' => 'O valor total é inválido.',
            'cliente.required' => 'O campo do cliente é obrigatório.',
            'situacao.required' => 'O campo Situação é obrigatório.',
            //'cdFuncionario.required' => 'Não há código do funcionário operante.',
            'tipoPagamento.required' => 'O campo Tipo de Pagamento é obrigatório.',
            'parcelas.required' => 'O campo Parcelas é obrigatório.',
            'parcelas.min' => 'O mínimo de parcelas é 1',
            'parcelas.max' => 'O máximo de aprcelas é 12'
        ];
    }
}
