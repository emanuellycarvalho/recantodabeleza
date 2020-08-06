<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'nmProduto'=>'required',
            'marca'=>'required',
            'qtd'=>'required|numeric',
            'precoProduto'=>'required',
            'comissao'=>'required',
            'foto'=>'required'
        ];
    }

    public function messages() {
        return [
            'nmProduto.required'=>'O campo nome do produto é obrigatório',
            'marca.required'=>'O campo marca é obrigatório',
            'qtd.required'=>'Informe a quantidade disponível em estoque',
            'qtd.numeric'=>'Digite um número no campo de quantidade',
            'precoProduto.required'=>'Preencha o campo preço',
            'comissao.required'=>'O campo comissão é obrigatório',
            'foto.required'=>'O campo foto é obrigatório'
        ];
    }
}
