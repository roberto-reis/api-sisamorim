<?php

namespace App\Domain\Produto\Actions;

use App\Exceptions\ProdutoException;
use App\Shared\DTO\Produto\ProdutoDTO;
use App\Infrastructure\Models\Produto;

class UpdateProdutoAction
{

    public function __invoke(ProdutoDTO $dto, $uuid = null)
    {
        $produto = Produto::find($uuid);

        if (!$produto) {
            throw new ProdutoException('Produto não encontrado ou não existe', 404);
        }

        $produto->centro_custo_uuid = $dto->centro_custo_uuid;
        $produto->codigo = $dto->codigo;
        $produto->nome = $dto->nome;
        $produto->descricao = $dto->descricao;
        $produto->unidade_medida = strtoupper($dto->unidade_medida);
        $produto->cor = $dto->cor;
        $produto->preco_custo = $dto->preco_custo;
        $produto->pecentual_lucro = $dto->pecentual_lucro;
        $produto->estoque = $dto->estoque ?? 0;
        $produto->save();

        return $produto;
    }

}
