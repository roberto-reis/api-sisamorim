<?php

namespace App\Domain\CentroCusto\Repositories;

use Illuminate\Http\Request;
use App\Infrastructure\Models\CentroCusto;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CentroCustoRepository
{
    /** @var int */
    private $perPage = 10;

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getCentroCusto(Request $request): LengthAwarePaginator|Collection
    {
        // TODO: Mover para um Action
        $search = $request->get('search');
        $withPaginate = (bool)$request->get('with_paginate', true);
        $this->perPage = $request->get('perPage', $this->perPage);
        $centroCustos = CentroCusto::query();

        if ($search) {
            $centroCustos->where('nome', 'like', "%{$search}%");
        }

        if ($withPaginate === false) {
            return $centroCustos->get();
        }

        return $centroCustos->paginate($this->perPage);
    }

}
