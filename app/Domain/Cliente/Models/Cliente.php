<?php

namespace App\Domain\Cliente\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

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
