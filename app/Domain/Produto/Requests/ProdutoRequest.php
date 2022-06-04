<?php

namespace App\Domain\Produto\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'codigo' => ['required', 'string', 'max:100'],
            'nome' => ['required', 'string', 'max:150'],
            'descricao' => ['required', 'string'],
            'unidade_medida' => ['required', 'string', 'max:3'],
            'cor' => ['null', 'string', 'max:50'],
            'preco_custo' => ['null', 'numeric'],
            'pecentual_lucro' => ['null', 'numeric'],
            'estoque' => ['null', 'numeric'],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'codigo.required' => 'O campo código é obrigatório',
            'codigo.string' => 'O campo código deve ser uma string',
            'codigo.max' => 'O campo código deve ter no máximo 100 caracteres',
            'nome.required' => 'O campo nome é obrigatório',
            'nome.string' => 'O campo nome deve ser uma string',
            'nome.max' => 'O campo nome deve ter no máximo 100 caracteres',
            'descricao.required' => 'O campo descrição é obrigatório',
            'descricao.string' => 'O campo descrição deve ser uma string',
            'unidade_medida.required' => 'O campo unidade de medida é obrigatório',
            'unidade_medida.string' => 'O campo unidade de medida deve ser uma string',
            'unidade_medida.max' => 'O campo unidade de medida deve ter no máximo 3 caracteres',
            'cor.string' => 'O campo cor deve ser uma string',
            'cor.max' => 'O campo cor deve ter no máximo 50 caracteres',
            'preco_custo.numeric' => 'O campo preço de custo deve ser um número',
            'pecentual_lucro.numeric' => 'O campo percentual de lucro deve ser um número',
            'estoque.numeric' => 'O campo estoque deve ser um número'
        ];
    }
}
