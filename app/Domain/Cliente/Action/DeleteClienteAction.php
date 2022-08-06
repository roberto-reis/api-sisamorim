<?php

namespace App\Domain\Cliente\Action;

use App\Domain\Cliente\Models\Cliente;

class DeleteClienteAction
{
    public function __invoke(string $uuid): bool
    {
        $cliente = Cliente::find($uuid);

        if (!$cliente) {
            throw new \Exception('Cliente não encontrado', 404);
        }

        return $cliente->delete();
    }
}
