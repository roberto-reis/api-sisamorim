<?php

namespace App\Domain\Produto\Models;

use App\Models\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use App\Domain\CentroCusto\Models\CentroCusto;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;
    use UuidTrait;

    protected $table = 'produtos';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

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

    public function centroCusto()
    {
        return $this->belongsTo(CentroCusto::class, 'centro_custo_uuid', 'uuid');
    }

}