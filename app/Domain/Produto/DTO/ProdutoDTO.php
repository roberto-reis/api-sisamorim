<?php

namespace App\Domain\Produto\DTO;

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

    public function __construct(
        string $centro_custo_uuid,
        string $codigo,
        string $nome,
        string $descricao,
        string $unidade_medida,
        string $cor,
        ?float $preco_custo,
        ?float $pecentual_lucro,
        ?int $estoque
    ) {
        $this->centro_custo_uuid = $centro_custo_uuid;
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->unidade_medida = $unidade_medida;
        $this->cor = $cor;
        $this->preco_custo = $preco_custo;
        $this->pecentual_lucro = $pecentual_lucro;
        $this->estoque = $estoque;
    }

    public static function register(array $data): ProdutoDTO
    {
        return new self(
            $data['centro_custo_uuid'],
            $data['codigo'],
            $data['nome'],
            $data['descricao'],
            $data['unidade_medida'],
            $data['cor'],
            $data['preco_custo'],
            $data['pecentual_lucro'],
            $data['estoque']
        );
    }
}
