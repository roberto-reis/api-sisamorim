<?php

namespace App\Domain\CentroCusto\Models;

use App\Models\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CentroCustoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CentroCusto extends Model
{
    use HasFactory;
    use UuidTrait;

    protected $table = 'centro_custos';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s',
        'updated_at' => 'datetime:Y-m-d h:i:s'
    ];

    protected $fillable = [
        'nome',
    ];

    protected static function newFactory()
    {
        return CentroCustoFactory::new();
    }

}
