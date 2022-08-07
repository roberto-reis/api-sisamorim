<?php

namespace App\Infrastructure\Models;

use App\Infrastructure\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\FornecedorFactory;
use App\Infrastructure\Models\TipoCadastro;
use App\Infrastructure\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'uuid',
        'status_uuid',
        'tipo_cadastro_uuid',
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
        'banco',
        'agencia',
        'digito_agencia',
        'conta',
        'digito_conta',
        'tipo_conta'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_uuid', 'uuid');
    }

    public function tipoCadastro()
    {
        return $this->belongsTo(TipoCadastro::class, 'tipo_cadastro_uuid', 'uuid');
    }

    protected static function newFactory()
    {
        return FornecedorFactory::new();
    }
}
