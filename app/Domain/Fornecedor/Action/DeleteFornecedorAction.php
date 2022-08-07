<?php

namespace App\Domain\Fornecedor\Action;

use App\Exceptions\FornecedorException;
use App\Infrastructure\Models\Fornecedor;

class DeleteFornecedorAction
{
    /**
     * @param string $uuid
     * @return bool
     * @throws FornecedorException
     */
    public function __invoke(string $uuid): bool
    {
        $fornecedor = Fornecedor::find($uuid);

        if (!$fornecedor) {
            throw new FornecedorException('Fornecedor não encontrado.', 404);
        }

        return $fornecedor->delete();

    }
}
