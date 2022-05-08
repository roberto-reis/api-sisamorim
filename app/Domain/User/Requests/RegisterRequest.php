<?php

namespace App\Domain\User\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required', 
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->symbols()
                    ->uncompromised(),
                'confirmed',
            ],
        ];
    }

    public function messages()
    {
        return [
            'fist_name.required' => 'O campo nome é obrigatório',
            'fist_name.string' => 'O campo nome deve ser um texto',
            'fist_name.max' => 'O campo nome deve ter no máximo 255 caracteres',
            'last_name.required' => 'O campo sobrenome é obrigatório',
            'last_name.string' => 'O campo sobrenome deve ser um texto',
            'last_name.max' => 'O campo sobrenome deve ter no máximo 255 caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.string' => 'O campo email deve ser um texto',
            'email.email' => 'O campo email deve ser um email válido',
            'email.max' => 'O campo email deve ter no máximo 255 caracteres',
            'email.unique' => 'O email informado já está cadastrado',
            'password.required' => 'O campo senha é obrigatório',
            'password.string' => 'O campo senha deve ser um texto',
            'password.confirmed' => 'As senhas não conferem',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres',
        ];
    }

}
