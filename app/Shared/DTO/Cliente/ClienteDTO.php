<?php

namespace App\Shared\DTO\Cliente;

use App\Shared\DTO\DTOAbstract;

class ClienteDTO extends DTOAbstract
{
    /** @var string */
    public $nome;

    /** @var ?string */
    public $email;

    /** @var ?string */
    public $cpf;

    /** @var ?string */
    public $cnpj;

    /** @var ?string */
    public $rg;

    /** @var ?string */
    public $data_nascimento;

    /** @var ?string */
    public $celular;

    /** @var ?string */
    public $inscricao_estadual;

    /** @var ?string */
    public $inscricao_municipal;

    /** @var ?string */
    public $cep;

    /** @var ?string */
    public $endereco;

    /** @var ?string */
    public $numero;

    /** @var ?string */
    public $complemento;

    /** @var ?string */
    public $bairro;

    /** @var ?string */
    public $cidade;

    /** @var ?string */
    public $uf;

    /** @var ?string */
    public $observacao;

    /** @var bool */
    public $status;

    public function register(
        string $nome,
        ?string $email,
        ?string $cpf,
        ?string $cnpj,
        ?string $rg,
        ?string $dataNascimento,
        ?string $celular,
        ?string $inscricaoEstadual,
        ?string $inscricaoMunicipal,
        ?string $cep,
        ?string $endereco,
        ?string $numero,
        ?string $complemento,
        ?string $bairro,
        ?string $cidade,
        ?string $uf,
        ?string $observacao,
        bool $status
    ): self {
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->cnpj = $cnpj;
        $this->rg = $rg;
        $this->data_nascimento = $dataNascimento;
        $this->celular = $celular;
        $this->inscricao_estadual = $inscricaoEstadual;
        $this->inscricao_municipal = $inscricaoMunicipal;
        $this->cep = $cep;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->observacao = $observacao;
        $this->status = $status;

        return $this;
    }

}
