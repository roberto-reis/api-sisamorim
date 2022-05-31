<?php

namespace App\Domain\CentroCusto\Actions;

use App\Domain\CentroCusto\Model\CentroCusto;
use App\Domain\CentroCusto\DTO\CentroCustoDTO;

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
