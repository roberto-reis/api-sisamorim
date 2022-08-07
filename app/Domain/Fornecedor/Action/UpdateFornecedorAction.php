<?php

namespace App\Domain\Fornecedor\Action;

use App\Exceptions\FornecedorException;
use App\Infrastructure\Models\Fornecedor;
use App\Shared\DTO\Fornecedor\FornecedorDTO;

class UpdateFornecedorAction
{
    /**
     * @param string $uuid
     * @param FornecedorDTO $dto
     * @return Fornecedor
     * @throws FornecedorException
     */
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
