<?php

namespace App\Domain\Fornecedor\Action;

use App\Exceptions\FornecedorException;
use App\Domain\Fornecedor\DTO\FornecedorDTO;
use App\Domain\Fornecedor\Models\Fornecedor;

class UpdateFornecedorAction
{
    public function __invoke(string $uuid, FornecedorDTO $dto): Fornecedor
    {
        $fornecedor = Fornecedor::find($uuid);

        if (!$fornecedor) {
            throw new FornecedorException('Fornecedor não encontrado', 404);
        }

        $fornecedor->update($dto->toArray());

        return $fornecedor;
    }

}
