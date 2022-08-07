<?php

namespace App\Domain\Fornecedor\Action;

use App\Infrastructure\Models\Fornecedor;
use App\Domain\Fornecedor\DTO\FornecedorDTO;

class CreateFornecedorAction
{
    /**
     * @param FornecedorDTO $dto
     * @return Fornecedor
     */
    public function __invoke(FornecedorDTO $dto): Fornecedor
    {
        $fornecedor = Fornecedor::create($dto->toArray());

        return $fornecedor;
    }
}
