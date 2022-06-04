<?php

namespace App\Domain\Produto\Models;

use App\Models\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;
    use UuidTrait;

    protected $table = 'produto';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'codigo_barra',
        'nome',
        'descricao',
        'unidade_medida',
        'cor',
        'preco_custo',
        'pecentual_lucro',
        'estoque',
        'foto_url'
    ];
}
