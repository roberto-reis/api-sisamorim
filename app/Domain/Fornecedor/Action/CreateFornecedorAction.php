<?php

namespace App\Domain\Fornecedor\Action;

use App\Domain\Fornecedor\DTO\FornecedorDTO;
use App\Domain\Fornecedor\Models\Fornecedor;
use Illuminate\Database\Eloquent\Collection;

class CreateFornecedorAction
{
    public function __invoke(FornecedorDTO $dto): Collection
    {
        $fornecedor = Fornecedor::create($dto->toArray());

        return $fornecedor;
    }
}
