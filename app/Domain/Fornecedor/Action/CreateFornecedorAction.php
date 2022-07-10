<?php

namespace App\Domain\Fornecedor\Action;

use App\Domain\Fornecedor\DTO\FornecedorDTO;
use App\Domain\Fornecedor\Models\Fornecedor;

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
