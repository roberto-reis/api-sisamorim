<?php

namespace App\Shared\DTO\CentroCusto;

use App\Shared\DTO\DTOAbstract;

class CentroCustoDTO extends DTOAbstract
{
    /** @var string */
    public $nome;

    public function register(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

}
