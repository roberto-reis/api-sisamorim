<?php

namespace App\Domain\Fornecedor\Action;

use App\Domain\Fornecedor\Models\Fornecedor;

class ListFornecedorAction
{
    protected $perPage = 15;

    public function __invoke(array $dataRequest)
    {
        $fornecedores = Fornecedor::query();

        if (isset($dataRequest['search'])) {
            $fornecedores->where("nome_razao_social", 'like', "%{$dataRequest['search']}%")
                         ->orWhere("email", 'like', "%{$dataRequest['search']}%")
                         ->orWhere("cpf", 'like', "%{$dataRequest['search']}%")
                         ->orWhere("cnpj", 'like', "%{$dataRequest['search']}%");
        }

        if (isset($dataRequest['with_paginate']) && (bool) $dataRequest['with_paginate'] === false) {
            return $fornecedores->get();
        }

        if (isset($dataRequest['per_page'])) {
            $this->perPage = (int) $dataRequest['per_page'];
        }

        return $fornecedores->paginate($this->perPage);
    }
}

