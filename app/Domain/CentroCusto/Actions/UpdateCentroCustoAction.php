<?php

namespace App\Domain\CentroCusto\Actions;

use App\Domain\CentroCusto\Model\CentroCusto;
use App\Domain\CentroCusto\DTO\CentroCustoDTO;

class UpdateCentroCustoAction
{
    public function __invoke(CentroCustoDTO $dto, $uid = null)
    {
        $centroCusto = CentroCusto::find($uid);

        if (!$centroCusto) {
            throw new \Exception('Centro de Custo não encontrado');
        }

        $centroCusto->nome = $dto->nome;
        $centroCusto->save();

        return $centroCusto;
    }

}
