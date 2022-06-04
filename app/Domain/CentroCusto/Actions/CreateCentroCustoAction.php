<?php

namespace App\Domain\CentroCusto\Actions;

use App\Domain\CentroCusto\DTO\CentroCustoDTO;
use App\Domain\CentroCusto\Models\CentroCusto;

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
