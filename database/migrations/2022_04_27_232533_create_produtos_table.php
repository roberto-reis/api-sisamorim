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
            $table->foreignUuid('centro_custo_uuid');
            $table->string('codigo', 100)->unique();
            $table->string('nome', 150)->index();
            $table->longText('descricao');
            $table->char('unidade_medida', 5);
            $table->string('cor', 50)->nullable();
            $table->double('preco_custo', 10, 2)->nullable();
            $table->double('pecentual_lucro', 10, 2)->nullable();
            $table->integer('estoque')->default(0);
            $table->longText('foto_url')->nullable();
            $table->timestamps();

            $table->foreign('centro_custo_uuid')->references('uuid')->on('centro_custos');
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
