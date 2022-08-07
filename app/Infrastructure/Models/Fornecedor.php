<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\FornecedorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Infrastructure\Models\Traits\UuidTrait;

class Fornecedor extends Model
{
    use HasFactory;
    use UuidTrait;

    protected $table = 'fornecedores';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s'
    ];

    protected $fillable = [
        'nome_razao_social',
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

    protected static function newFactory()
    {
        return FornecedorFactory::new();
    }
}
