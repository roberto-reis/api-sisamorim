<?php

namespace App\Domain\CentroCusto\Actions;

use App\Domain\CentroCusto\Models\CentroCusto;
use App\Domain\CentroCusto\DTO\CentroCustoDTO;
use App\Exceptions\CentroCustoException;

class UpdateCentroCustoAction
{
    public function __invoke(CentroCustoDTO $dto, $uuid = null)
    {
        $centroCusto = CentroCusto::find($uuid);

        if (!$centroCusto) {
            throw new CentroCustoException('Centro de Custo não encontrado ou não existe');
        }

        $centroCusto->nome = $dto->nome;
        $centroCusto->save();

        return $centroCusto;
    }

}
