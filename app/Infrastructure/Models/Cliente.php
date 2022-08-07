<?php

namespace App\Infrastructure\Models;

use Database\Factories\ClienteFactory;
use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;
    use UuidTrait;

    protected $table = 'clientes';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s',
        'status' => 'boolean'
    ];

    protected $fillable = [
        'uuid',
        'nome',
        'email',
        'cpf',
        'cnpj',
        'rg',
        'data_nascimento',
        'celular',
        'inscricao_estadual',
        'inscricao_municipal',
        'cep',
        'endereco',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'observacao',
        'status',
    ];

    protected static function newFactory()
    {
        return ClienteFactory::new();
    }
}
