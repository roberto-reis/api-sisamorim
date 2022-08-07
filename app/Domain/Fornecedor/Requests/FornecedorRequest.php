<?php

namespace App\Domain\Fornecedor\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FornecedorRequest extends FormRequest
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
            'nome_razao_social' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'max:150', 'email', Rule::unique('fornecedores')->ignore($this->uuid, 'uuid')],
            'cpf' => ['nullable', 'string', 'max:11', Rule::unique('fornecedores')->ignore($this->uuid, 'uuid')],
            'cnpj' => ['nullable', 'string', 'max:14', Rule::unique('fornecedores')->ignore($this->uuid, 'uuid')],
            'inscricao_estadual' => ['nullable', 'string', 'max:30'],
            'inscricao_municipal' => ['nullable', 'string', 'max:30'],
            'celular' => ['required', 'string', 'max:30'],
            'cep' => ['nullable', 'string', 'max:8'],
            'endereco' => ['nullable', 'string', 'max:150'],
            'numero' => ['nullable', 'string', 'max:20'],
            'complemento' => ['nullable', 'string', 'max:100'],
            'bairro' => ['nullable', 'string', 'max:50'],
            'cidade' => ['nullable', 'string', 'max:50'],
            'uf' => ['nullable', 'string', 'max:2'],
            'observacao' => ['nullable', 'string', 'max:255'],
            'banco' => ['nullable', 'string', 'max:50'],
            'agencia' => ['nullable', 'integer'],
            'digito_agencia' => ['nullable', 'integer'],
            'conta' => ['nullable', 'integer'],
            'digito_conta' => ['nullable', 'integer'],
            'tipo_conta' => ['nullable', 'string', 'max:20']
        ];
    }

    public function messages(): array
    {
        return [
            'status_uuid.exists' => 'Status não encontrado',
            'tipo_cadastro_uuid.exists' => 'Tipo de cadastro não encontrado',
            'nome_razao_social.required' => 'O campo nome/razão social é obrigatório',
            'nome_razao_social.string' => 'O campo nome/razão social deve ser uma string',
            'nome_razao_social.max' => 'O campo nome/razão social deve ter no máximo 100 caracteres',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.string' => 'O campo e-mail deve ser uma string',
            'email.max' => 'O campo e-mail deve ter no máximo 150 caracteres',
            'email.email' => 'O campo e-mail deve ser um e-mail válido',
            'email.unique' => 'O campo e-mail já está cadastrado',
            'cpf.unique' => 'O CPF já está cadastrado',
            'cnpj.unique' => 'O CNPJ já está cadastrado',
            'inscricao_estadual.max' => 'O campo inscrição estadual deve ter no máximo 30 caracteres',
            'inscricao_municipal.max' => 'O campo inscrição municipal deve ter no máximo 30 caracteres',
            'celular.required' => 'O campo celular é obrigatório',
            'celular.max' => 'O campo celular deve ter no máximo 30 caracteres',
            'cep.max' => 'O campo CEP deve ter no máximo 8 caracteres',
            'endereco.max' => 'O campo endereço deve ter no máximo 150 caracteres',
            'numero.max' => 'O campo número deve ter no máximo 20 caracteres',
            'complemento.max' => 'O campo complemento deve ter no máximo 100 caracteres',
            'bairro.max' => 'O campo bairro deve ter no máximo 50 caracteres',
            'cidade.max' => 'O campo cidade deve ter no máximo 50 caracteres',
            'uf.max' => 'O campo UF deve ter no máximo 2 caracteres',
            'observacao.max' => 'O campo observação deve ter no máximo 255 caracteres',
            'banco.max' => 'O campo banco deve ter no máximo 50 caracteres',
            'agencia.integer' => 'O campo agência deve ser um número inteiro',
            'digito_agencia.integer' => 'O campo dígito da agência deve ser um número inteiro',
            'conta.integer' => 'O campo conta deve ser um número inteiro',
            'digito_conta.integer' => 'O campo dígito da conta deve ser um número inteiro',
            'tipo_conta.max' => 'O campo tipo de conta deve ter no máximo 20 caracteres'
        ];
    }
}
