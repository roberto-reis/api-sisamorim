<?php

namespace App\Domain\Fornecedor\DTO;

use App\Domain\Fornecedor\Requests\FornecedorRequest;

class FornecedorDTO
{
    /** @var string */
    public $nomeRazaoSocial;
    /** @var string */
    public $email;
    /** @var string|null */
    public $cpf;
    /** @var string|null */
    public $cnpj;
    /** @var string|null */
    public $inscricaoEstadual;
    /** @var string|null */
    public $inscricaoMunicipal;
    /** @var string */
    public $celular;
    /** @var string|null */
    public $cep;
    /** @var string|null */
    public $endereco;
    /** @var string|null */
    public $numero;
    /** @var string|null */
    public $complemento;
    /** @var string|null */
    public $bairro;
    /** @var string|null */
    public $cidade;
    /** @var string|null */
    public $uf;
    /** @var string|null */
    public $observacao;
    /** @var string */
    public $tipoFornecedor;
    /** @var string|null */
    public $banco;
    /** @var int|null */
    public $agencia;
    /** @var string|null */
    public $digitoAgencia;
    /** @var int */
    public $conta;
    /** @var string|null */
    public $digitoConta;
    /** @var string|null */
    public $tipoConta;
    /** @var bool */
    public $status;

    public function __construct(
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
    ) {
        $this->nomeRazaoSocial = $nomeRazaoSocial;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->cnpj = $cnpj;
        $this->inscricaoEstadual = $inscricaoEstadual;
        $this->inscricaoMunicipal = $inscricaoMunicipal;
        $this->celular = $celular;
        $this->cep = $cep;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->observacao = $observacao;
        $this->tipoFornecedor = $tipoFornecedor;
        $this->banco = $banco;
        $this->agencia = $agencia;
        $this->digitoAgencia = $digitoAgencia;
        $this->conta = $conta;
        $this->digitoConta = $digitoConta;
        $this->tipoConta = $tipoConta;
        $this->status = $status;
    }

    public static function fromRequest(FornecedorRequest $request): FornecedorDTO
    {
        return new self(
            $request->nome_razao_social,
            $request->email,
            $request->cpf,
            $request->cnpj,
            $request->inscricao_estadual,
            $request->inscricao_municipal,
            $request->celular,
            $request->cep,
            $request->endereco,
            $request->numero,
            $request->complemento,
            $request->bairro,
            $request->cidade,
            $request->uf,
            $request->observacao,
            $request->tipo_fornecedor,
            $request->banco,
            $request->agencia,
            $request->digito_agencia,
            $request->conta,
            $request->digito_conta,
            $request->tipo_conta,
            $request->status
        );
    }

}
