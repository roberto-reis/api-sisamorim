<?php

namespace App\Domain\CentroCusto\Actions;

use App\Exceptions\CentroCustoException;
use App\Domain\CentroCusto\Models\CentroCusto;

class DeleteCentroCustoAction
{
    public function __invoke($uuid = null)
    {
        $centroCusto = CentroCusto::find($uuid);

        if (!$centroCusto) {
            throw new CentroCustoException('Centro de Custo não encontrado');
        }

        $centroCusto->delete();

        return $centroCusto;
    }

}
