<?php

namespace App\Domain\Cliente\Action;

use App\Infrastructure\Models\Cliente;
use App\Shared\DTO\Cliente\ClienteDTO;

class CreateClienteAction
{

    public function __invoke(ClienteDTO $dto)
    {
        $cliente = new Cliente();
        $cliente->status_uuid = $dto->status_uuid;
        $cliente->tipo_cadastro_uuid = $dto->tipo_cadastro_uuid;
        $cliente->nome = $dto->nome;
        $cliente->email = $dto->email;
        $cliente->cpf = $dto->cpf;
        $cliente->cnpj = $dto->cnpj;
        $cliente->rg = $dto->rg;
        $cliente->data_nascimento = $dto->data_nascimento;
        $cliente->celular = $dto->celular;
        $cliente->inscricao_estadual = $dto->inscricao_estadual;
        $cliente->inscricao_municipal = $dto->inscricao_municipal;
        $cliente->cep = $dto->cep;
        $cliente->endereco = $dto->endereco;
        $cliente->numero = $dto->numero;
        $cliente->complemento = $dto->complemento;
        $cliente->bairro = $dto->bairro;
        $cliente->cidade = $dto->cidade;
        $cliente->uf = $dto->uf;
        $cliente->observacao = $dto->observacao;
        $cliente->save();

        return $cliente;
    }

}
