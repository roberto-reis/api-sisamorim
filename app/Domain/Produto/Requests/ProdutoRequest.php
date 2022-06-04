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
    public function rules()
    {
        return [
            'codigo_barra' => ['required', 'string', 'max:100'],
            'nome' => ['required', 'string', 'max:150'],
            'descricao' => ['required', 'string'],
            'unidade_medida' => ['required', 'string', 'max:3'],
            'cor' => ['required', 'string', 'max:50'],
            'preco_custo' => ['required', 'numeric'],
            'pecentual_lucro' => ['required', 'numeric'],
            'estoque' => ['null', 'numeric'],
            'foto_url' => ['null', 'string', 'max:150'],
        ];
    }
}
