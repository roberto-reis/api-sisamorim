<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use App\Infrastructure\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoCadastro extends Model
{
    use HasFactory;
    use UuidTrait;

    protected $table = 'tipos_cadastros';
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nome',
        'nome_exibicao',
    ];
}
