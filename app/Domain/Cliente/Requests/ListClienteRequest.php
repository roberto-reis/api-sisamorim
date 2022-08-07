<?php

namespace App\Domain\Cliente\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListClienteRequest extends FormRequest
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
            'search' => 'nullable|string',
            'with_paginate' => 'nullable|boolean',
            'per_page' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'search.string' => 'O campo search deve ser uma string',
            'with_paginate.boolean' => 'O campo with_paginate deve ser um boolean',
            'per_page.integer' => 'O campo per_page deve ser um inteiro',
        ];
    }
}
