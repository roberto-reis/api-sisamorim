<?php

namespace App\Domain\Fornecedor\Models;

use App\Models\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fornecedor extends Model
{
    use HasFactory;
    use UuidTrait;

    protected $table = 'fornecedores';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nome_rasao_social',
        'email',
        'cpf',
        'cnpj',
        'inscricao_estadual',
        'inscricao_municipal',
        'celular',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'observacao',
        'tipo_fornecedor',
        'banco',
        'agencia',
        'digito_agencia',
        'conta',
        'digito_conta',
        'tipo_conta',
        'status',
    ];
}
