<?php

namespace App\Domain\Cliente\Action;

use App\Infrastructure\Models\Cliente;


class ListClienteAction
{
    protected $perPage = 15;

    public function execute(array $dataRequest)
    {
        $clientes = Cliente::query();

        if (isset($dataRequest['search'])) {
            $clientes->where('nome', 'like', '%' . $dataRequest['search'] . '%')
                     ->orWhere('email', 'like', '%' . $dataRequest['search'] . '%')
                     ->orWhere('cpf_cnpj', 'like', '%' . $dataRequest['search'] . '%')
                     ->orWhere('endereco', 'like', '%' . $dataRequest['search'] . '%');
        }

        if (isset($dataRequest['with_paginate']) && (bool)$dataRequest['with_paginate'] === false) {
            return $clientes->get();
        }

        if (isset($dataRequest['per_page'])) {
            $this->perPage = $dataRequest['per_page'];
        }

        return $clientes->paginate($this->perPage);
    }
}
