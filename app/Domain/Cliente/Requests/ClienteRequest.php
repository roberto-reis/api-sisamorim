<?php

namespace App\Domain\Cliente\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'status_uuid' => ['required', 'string', Rule::exists('status', 'uuid')],
            'tipo_cadastro_uuid' => ['required', 'string', Rule::exists('tipos_cadastros', 'uuid')],
            'nome' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'string', 'max:100', 'email', Rule::unique('clientes')->ignore($this->uuid, 'uuid')],
            'cpf' => ['nullable', 'digits:11', 'regex:/^[0-9]+$/', Rule::unique('clientes')->ignore($this->uuid, 'uuid')],
            'cnpj' => ['nullable', 'digits:14', 'regex:/^[0-9]+$/', Rule::unique('clientes')->ignore($this->uuid, 'uuid')],
            'rg' => ['nullable', 'string', 'max:20'],
            'data_nascimento' => ['nullable', 'date'],
            'celular' => ['nullable', 'string', 'max:11'],
            'inscricao_estadual' => ['nullable', 'string', 'max:30'],
            'inscricao_municipal' => ['nullable', 'string', 'max:30'],
            'cep' => ['nullable', 'string', 'max:8'],
            'endereco' => ['nullable', 'string', 'max:150'],
            'numero' => ['nullable', 'string', 'max:20'],
            'complemento' => ['nullable', 'string', 'max:100'],
            'bairro' => ['nullable', 'string', 'max:50'],
            'cidade' => ['nullable', 'string', 'max:50'],
            'uf' => ['nullable', 'string', 'max:2'],
            'observacao' => ['nullable', 'string', 'max:255']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'status_uuid.exists' => 'Status não encontrado',
            'tipo_cadastro_uuid.exists' => 'Tipo de cadastro não encontrado',
            'nome.required' => 'O campo nome é obrigatório',
            'nome.string' => 'O campo nome deve ser uma string',
            'nome.max' => 'O campo nome deve ter no máximo 100 caracteres',
            'email.string' => 'O campo email deve ser uma string',
            'email.max' => 'O campo email deve ter no máximo 100 caracteres',
            'email.email' => 'O campo email deve ser um e-mail válido',
            'email.unique' => 'O campo email deve ser único',
            'cpf.digits' => 'O campo cpf deve ter 11 dígitos',
            'cpf.regex' => 'O campo cpf deve conter apenas números',
            'cpf.unique' => 'O campo cpf deve ser único',
            'cnpj.digits' => 'O campo cnpj deve ter 14 dígitos',
            'cnpj.regex' => 'O campo cnpj deve conter apenas números',
            'cnpj.unique' => 'O campo cnpj deve ser único',
            'rg.string' => 'O campo rg deve ser uma string',
            'rg.max' => 'O campo rg deve ter no máximo 20 caracteres',
            'data_nascimento.date' => 'O campo data de nascimento deve ser uma data válida',
            'celular.string' => 'O campo celular deve ser uma string',
            'celular.max' => 'O campo celular deve ter no máximo 11 caracteres',
            'inscricao_estadual.string' => 'O campo inscrição estadual deve ser uma string',
            'inscricao_estadual.max' => 'O campo inscrição estadual deve ter no máximo 30 caracteres',
            'inscricao_municipal.string' => 'O campo inscrição municipal'
        ];
    }
}
