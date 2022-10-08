<?php

namespace App\Domain\Produto\Actions;

use App\Infrastructure\Models\Produto;
use Exception;

class ShowProdutoAction
{
    public function execute(string $uuid): array
    {
        $produto = Produto::find($uuid);

        if (! $produto) {
            throw new Exception('Produto não encontrado ou não existe', 404);
        }

        return $produto->toArray();
    }
}
