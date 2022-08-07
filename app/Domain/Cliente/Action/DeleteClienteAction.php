<?php

namespace App\Domain\Cliente\Action;

use App\Infrastructure\Models\Cliente;

/**
 * @param string $uuid
 * @return bool
 */
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
