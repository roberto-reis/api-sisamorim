<?php

namespace App\Domain\CentroCusto\Actions;

use App\Infrastructure\Models\CentroCusto;
use App\Shared\DTO\CentroCusto\CentroCustoDTO;

class CreateCentroCustoAction
{
    public function __invoke(CentroCustoDTO $dto)
    {
        $centroCusto = new CentroCusto();
        $centroCusto->nome = $dto->nome;
        $centroCusto->save();

        return $centroCusto;
    }
}
