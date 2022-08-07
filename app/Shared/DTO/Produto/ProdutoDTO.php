<?php

namespace App\Shared\DTO\Produto;

use App\Domain\Produto\Requests\ProdutoRequest;
use App\Shared\DTO\DTOAbstract;

class ProdutoDTO extends DTOAbstract
{
    /** @var string */
    public $centro_custo_uuid;
    /** @var string */
    public $codigo;
    /** @var string */
    public $nome;
    /** @var string */
    public $descricao;
    /** @var string */
    public $unidade_medida;
    /** @var string */
    public $cor;
    /** @var float|null */
    public $preco_custo;
    /** @var float|null */
    public $pecentual_lucro;
    /** @var int|null */
    public $estoque;

    public function register(
        string $centro_custo_uuid,
        string $codigo,
        string $nome,
        string $descricao,
        string $unidade_medida,
        string $cor,
        ?float $preco_custo,
        ?float $pecentual_lucro,
        ?int $estoque
    ): self {
        $this->centro_custo_uuid = $centro_custo_uuid;
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->unidade_medida = $unidade_medida;
        $this->cor = $cor;
        $this->preco_custo = $preco_custo;
        $this->pecentual_lucro = $pecentual_lucro;
        $this->estoque = $estoque;

        return $this;
    }

}
