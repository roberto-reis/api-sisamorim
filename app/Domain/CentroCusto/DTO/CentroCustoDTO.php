<?php

namespace App\Domain\CentroCusto\DTO;

use App\Domain\CentroCusto\Requests\CentroCustoRequest;

class CentroCustoDTO
{
    /** @var string */
    public $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public static function fromRequest(CentroCustoRequest $request): CentroCustoDTO
    {
        return new self(
            $request->nome
        );
    }

}
