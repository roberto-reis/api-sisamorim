<?php

namespace App\Domain\Produto\Actions;


use App\Exceptions\ProdutoException;
use App\Domain\Produto\Models\Produto;

class DeleteProdutoAction
{
    public function __invoke($uuid = null)
    {
        $produto = Produto::find($uuid);

        if (!$produto) {
            throw new ProdutoException('Produto não encontrado ou não existe', 404);
        }

        $produto->delete();

        return $produto;
    }

}
