<?php

namespace App\Domain\CentroCusto\DTO;

use App\Domain\CentroCusto\Requests\CentroCustoRequest;
use App\Shared\DTO\DTOAbstract;

class CentroCustoDTO extends DTOAbstract
{
    /** @var string */
    public $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public static function register(array $data): CentroCustoDTO
    {
        return new self(
            $data['nome']
        );
    }

}
