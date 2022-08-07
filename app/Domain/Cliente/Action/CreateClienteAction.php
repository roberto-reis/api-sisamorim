<?php

namespace App\Domain\Cliente\Action;

use App\Domain\Cliente\Models\Cliente;
use App\Shared\DTO\Cliente\ClienteDTO;

class CreateClienteAction
{

    public function __invoke(ClienteDTO $dto)
    {
        $cliente = new Cliente();
        $cliente->nome = $dto->nome;
        $cliente->email = $dto->email;
        $cliente->cpf = $dto->cpf; // TODO: criar um helper tratar removendo pontos e traços
        $cliente->cnpj = $dto->cnpj; // TODO: criar um helper tratar removendo pontos e traços
        $cliente->rg = $dto->rg; // TODO: criar um helper tratar removendo pontos e traços
        $cliente->data_nascimento = $dto->data_nascimento;
        $cliente->celular = $dto->celular;
        $cliente->inscricao_estadual = $dto->inscricao_estadual; // TODO: criar um helper tratar removendo pontos e traços
        $cliente->inscricao_municipal = $dto->inscricao_municipal; // TODO: criar um helper tratar removendo pontos e traços
        $cliente->cep = $dto->cep; // TODO: criar um helper tratar removendo pontos e traços
        $cliente->endereco = $dto->endereco;
        $cliente->numero = $dto->numero;
        $cliente->complemento = $dto->complemento;
        $cliente->bairro = $dto->bairro;
        $cliente->cidade = $dto->cidade;
        $cliente->uf = $dto->uf;
        $cliente->observacao = $dto->observacao;
        $cliente->status = $dto->status;
        $cliente->save();

        return $cliente;
    }

}
