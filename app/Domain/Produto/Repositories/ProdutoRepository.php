<?php

namespace App\Domain\Produto\Repositories;

use Illuminate\Http\Request;
use App\Infrastructure\Models\Produto;
use Illuminate\Pagination\LengthAwarePaginator;

class ProdutoRepository
{
    /** @var int */
    private $perPage = 10;

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getProdutos(Request $request): LengthAwarePaginator
    {
        // TODO: mover para uma action
        $search = $request->get('search');
        $this->perPage = $request->get('perPage', $this->perPage);
        $produto = Produto::query()->with('centroCusto');

        if ($search) {
            $produto->where('codigo', 'like', "%{$search}%")
                ->orWhere('nome', 'like', "%{$search}%")
                ->orWhere('descricao', 'like', "%{$search}%");
        }

        return $produto->paginate($this->perPage);
    }

}
