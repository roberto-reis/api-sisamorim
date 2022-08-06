<?php

namespace App\Domain\Cliente\Models;

use App\Models\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'cpf_cnpj',
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
}
