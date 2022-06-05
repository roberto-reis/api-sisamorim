<?php

namespace App\Domain\Produto\Repositories;

use App\Domain\Produto\Models\Produto;
use Illuminate\Http\Request;
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
