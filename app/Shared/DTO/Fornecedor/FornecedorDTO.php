<?php

namespace App\Shared\DTO\Fornecedor;

use App\Shared\DTO\DTOAbstract;

class FornecedorDTO extends DTOAbstract
{
    /** @var string */
    public $nome_razao_social;
    /** @var string */
    public $email;
    /** @var ?string */
    public $cpf;
    /** @var ?string */
    public $cnpj;
    /** @var ?string */
    public $inscricao_estadual;
    /** @var ?string */
    public $inscricao_municipal;
    /** @var string */
    public $celular;
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
    /** @var string */
    public $tipo_fornecedor;
    /** @var ?string */
    public $banco;
    /** @var int|null */
    public $agencia;
    /** @var ?string*/
    public $digito_agencia;
    /** @var int */
    public $conta;
    /** @var ?string */
    public $digito_conta;
    /** @var ?string */
    public $tipo_conta;
    /** @var bool */
    public $status;

    public function register(
        string $nomeRazaoSocial,
        string $email,
        ?string $cpf,
        ?string $cnpj,
        ?string $inscricaoEstadual,
        ?string $inscricaoMunicipal,
        string $celular,
        ?string $cep,
        ?string $endereco,
        ?string $numero,
        ?string $complemento,
        ?string $bairro,
        ?string $cidade,
        ?string $uf,
        ?string $observacao,
        ?string $tipoFornecedor,
        ?string $banco,
        ?int $agencia,
        ?string $digitoAgencia,
        ?int $conta,
        ?string $digitoConta,
        ?string $tipoConta,
        bool $status
    ): self {
        $this->nome_razao_social = $nomeRazaoSocial;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->cnpj = $cnpj;
        $this->inscricao_estadual = $inscricaoEstadual;
        $this->inscricao_municipal = $inscricaoMunicipal;
        $this->celular = $celular;
        $this->cep = $cep;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->observacao = $observacao;
        $this->tipo_fornecedor = $tipoFornecedor;
        $this->banco = $banco;
        $this->agencia = $agencia;
        $this->digito_agencia = $digitoAgencia;
        $this->conta = $conta;
        $this->digito_conta = $digitoConta;
        $this->tipo_conta = $tipoConta;
        $this->status = $status;

        return $this;
    }

}
