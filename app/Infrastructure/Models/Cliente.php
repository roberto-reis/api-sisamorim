<?php

namespace App\Infrastructure\Models;

use App\Infrastructure\Models\Status;
use Database\Factories\ClienteFactory;
use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Models\TipoCadastro;
use App\Infrastructure\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'status_uuid',
        'tipo_cadastro_uuid',
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
        'observacao'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_uuid', 'uuid');
    }

    public function tipoCadastro()
    {
        return $this->belongsTo(TipoCadastro::class, 'tipo_cadastro_uuid', 'uuid');
    }

    // public function cpf(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => formata_cpf_cnpj($value),
    //     );
    // }

    // public function cnpj(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => formata_cpf_cnpj($value),
    //     );
    // }

    protected static function newFactory()
    {
        return ClienteFactory::new();
    }
}
