<?php

namespace App\Domain\CentroCusto\Actions;

use App\Domain\CentroCusto\Model\CentroCusto;
use App\Domain\CentroCusto\DTO\CentroCustoDTO;

class DeleteCentroCustoAction
{
    public function __invoke($uid = null)
    {
        $centroCusto = CentroCusto::find($uid);

        if (!$centroCusto) {
            throw new \Exception('Centro de Custo não encontrado');
        }

        $centroCusto->delete();

    }

}
