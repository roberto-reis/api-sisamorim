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
            'tipo_fornecedor' => ['required', 'string', 'max:20'],
            'banco' => ['nullable', 'string', 'max:50'],
            'agencia' => ['nullable', 'integer'],
            'digito_agencia' => ['nullable', 'integer'],
            'conta' => ['nullable', 'integer'],
            'digito_conta' => ['nullable', 'integer'],
            'tipo_conta' => ['nullable', 'string', 'max:20'],
            'status' => ['required', 'boolean']
        ];
    }

    public function messages(): array
    {
        return [
            'nome_razao_social.required' => 'O campo nome/raz??o social ?? obrigat??rio',
            'nome_razao_social.string' => 'O campo nome/raz??o social deve ser uma string',
            'nome_razao_social.max' => 'O campo nome/raz??o social deve ter no m??ximo 100 caracteres',
            'email.required' => 'O campo e-mail ?? obrigat??rio',
            'email.string' => 'O campo e-mail deve ser uma string',
            'email.max' => 'O campo e-mail deve ter no m??ximo 150 caracteres',
            'email.email' => 'O campo e-mail deve ser um e-mail v??lido',
            'email.unique' => 'O campo e-mail j?? est?? cadastrado',
            'cpf.unique' => 'O CPF j?? est?? cadastrado',
            'cnpj.unique' => 'O CNPJ j?? est?? cadastrado',
            'inscricao_estadual.max' => 'O campo inscri????o estadual deve ter no m??ximo 30 caracteres',
            'inscricao_municipal.max' => 'O campo inscri????o municipal deve ter no m??ximo 30 caracteres',
            'celular.required' => 'O campo celular ?? obrigat??rio',
            'celular.max' => 'O campo celular deve ter no m??ximo 30 caracteres',
            'cep.max' => 'O campo CEP deve ter no m??ximo 8 caracteres',
            'endereco.max' => 'O campo endere??o deve ter no m??ximo 150 caracteres',
            'numero.max' => 'O campo n??mero deve ter no m??ximo 20 caracteres',
            'complemento.max' => 'O campo complemento deve ter no m??ximo 100 caracteres',
            'bairro.max' => 'O campo bairro deve ter no m??ximo 50 caracteres',
            'cidade.max' => 'O campo cidade deve ter no m??ximo 50 caracteres',
            'uf.max' => 'O campo UF deve ter no m??ximo 2 caracteres',
            'observacao.max' => 'O campo observa????o deve ter no m??ximo 255 caracteres',
            'tipo_fornecedor.required' => 'O campo tipo de fornecedor ?? obrigat??rio',
            'tipo_fornecedor.string' => 'O campo tipo de fornecedor deve ser uma string',
            'tipo_fornecedor.max' => 'O campo tipo de fornecedor deve ter no m??ximo 20 caracteres',
            'banco.max' => 'O campo banco deve ter no m??ximo 50 caracteres',
            'agencia.integer' => 'O campo ag??ncia deve ser um n??mero inteiro',
            'digito_agencia.integer' => 'O campo d??gito da ag??ncia deve ser um n??mero inteiro',
            'conta.integer' => 'O campo conta deve ser um n??mero inteiro',
            'digito_conta.integer' => 'O campo d??gito da conta deve ser um n??mero inteiro',
            'tipo_conta.max' => 'O campo tipo de conta deve ter no m??ximo 20 caracteres',
            'status.required' => 'O campo status ?? obrigat??rio',
            'status.boolean' => 'O campo status deve ser um booleano'
        ];
    }
}
