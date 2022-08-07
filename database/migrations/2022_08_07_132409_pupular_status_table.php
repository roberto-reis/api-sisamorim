<?php

use App\Infrastructure\Models\Status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    protected $status = [
        [
            'nome' => 'ativo',
            'nome_exibicao' => 'Ativo',
        ],
        [
            'nome' => 'inativo',
            'nome_exibicao' => 'Inativo',
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->status as $status) {
            Status::create($status);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->status as $status) {
            Status::where('nome', $status['nome'])->delete();
        }
    }
};
