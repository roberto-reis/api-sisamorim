<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('codigo_barra', 100);
            $table->string('nome', 150);
            $table->longText('descricao');
            $table->char('unidade_medida', 3);
            $table->string('cor', 50);
            $table->decimal('preco_custo', 10, 2);
            $table->decimal('pecentual_lucro', 10, 2);
            $table->decimal('estoque', 10, 2);
            $table->string('foto_url', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
};
