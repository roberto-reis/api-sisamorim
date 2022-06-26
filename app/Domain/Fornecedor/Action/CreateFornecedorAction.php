<?php

namespace App\Domain\Fornecedor\Action;

use App\Domain\Fornecedor\DTO\FornecedorDTO;
use App\Domain\Fornecedor\Models\Fornecedor;

class CreateFornecedorAction
{
    public function __invoke(FornecedorDTO $dto)
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome_rasao_social = $dto->nomeRazaoSocial;
        $fornecedor->email = $dto->email;
        $fornecedor->cpf = $dto->cpf;
        $fornecedor->cnpj = $dto->cnpj;
        $fornecedor->inscricao_estadual = $dto->inscricaoEstadual;
        $fornecedor->inscricao_municipal = $dto->inscricaoMunicipal;
        $fornecedor->celular = $dto->celular;
        $fornecedor->cep = $dto->cep;
        $fornecedor->endereco = $dto->endereco;
        $fornecedor->numero = $dto->numero;
        $fornecedor->complemento = $dto->complemento;
        $fornecedor->bairro = $dto->bairro;
        $fornecedor->cidade = $dto->cidade;
        $fornecedor->uf = $dto->uf;
        $fornecedor->observacao = $dto->observacao;
        $fornecedor->tipo_fornecedor = $dto->tipoFornecedor;
        $fornecedor->banco = $dto->banco;
        $fornecedor->agencia = $dto->agencia;
        $fornecedor->digito_agencia = $dto->digitoAgencia;
        $fornecedor->conta = $dto->conta;
        $fornecedor->digito_conta = $dto->digitoConta;
        $fornecedor->tipo_conta = $dto->tipoConta;
        $fornecedor->status = $dto->status;
        $fornecedor->save();
    }
}
