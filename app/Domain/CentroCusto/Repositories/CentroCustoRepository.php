<?php

namespace App\Domain\CentroCusto\Repositories;

use Illuminate\Http\Request;
use App\Domain\CentroCusto\Model\CentroCusto;
use Illuminate\Pagination\LengthAwarePaginator;

class CentroCustoRepository
{
    /** @var int */
    private $perPage = 10;

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getCentroCusto(Request $request): LengthAwarePaginator
    {
        $search = $request->get('search');
        $this->perPage = $request->get('perPage', $this->perPage);
        $centroCustos = CentroCusto::query();

        if ($search) {
            $centroCustos->where('nome', 'like', "%{$search}%");
        }

        return $centroCustos->paginate($this->perPage);
    }

}
