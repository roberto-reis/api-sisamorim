<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Infrastructure\Models\TipoCadastro;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    protected $tiposCadastro = [
        [
            'nome' => 'pessoa-fisica',
            'nome_exibicao' => 'Pessoa Física',
        ],
        [
            'nome' => 'pessoa-juridica',
            'nome_exibicao' => 'Pessoa Jurídica',
        ]
    ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->tiposCadastro as $tipoCadastro) {
            TipoCadastro::create($tipoCadastro);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->tiposCadastro as $tipoCadastro) {
            TipoCadastro::where('nome', $tipoCadastro['nome'])->delete();
        }
    }
};
