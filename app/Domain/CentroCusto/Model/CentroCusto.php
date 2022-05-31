<?php

namespace App\Domain\CentroCusto\Model;

use App\Models\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroCusto extends Model
{
    use HasFactory;
    use UuidTrait;

    protected $table = 'centro_custos';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'nome',
    ];

}
