<?php

namespace App\Infrastructure\Models;

use Database\Factories\ProdutoFactory;
use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Models\CentroCusto;
use App\Infrastructure\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;
    use UuidTrait;

    protected $table = 'produtos';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s'
    ];

    protected $fillable = [
        'centro_custo_uuid',
        'codigo',
        'nome',
        'descricao',
        'unidade_medida',
        'cor',
        'preco_custo',
        'pecentual_lucro',
        'estoque',
        'foto_url'
    ];

    protected $appends = [
        'preco_venda'
    ];

    protected static function newFactory()
    {
        return ProdutoFactory::new();
    }

    public function centroCusto()
    {
        return $this->belongsTo(CentroCusto::class, 'centro_custo_uuid', 'uuid');
    }

    protected function precoVenda(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->calculaPrecoVenda((float)$this->preco_custo, (float)$this->pecentual_lucro),
        );
    }

    private function calculaPrecoVenda(float $precoCusto, float $pecentualLucro): float|null
    {
        if ($precoCusto == "" || $precoCusto == null || $pecentualLucro == "" || $pecentualLucro == null) {
            return null;
        }

        return $precoCusto + (($pecentualLucro / 100) * $precoCusto);
    }

}
