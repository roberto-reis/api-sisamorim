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
        Schema::create('orcamentos_has_servicos', function (Blueprint $table) {
            $table->foreignId('orcamento_uuid');
            $table->foreignId('servico_uuid');
            $table->integer('qunatidade');
            $table->double('valor_unitario', 10, 2);
            $table->double('valor_subtotal', 10, 2);
            $table->timestamps();

            $table->unique(['orcamento_uuid', 'servico_uuid']);

            $table->foreign('orcamento_uuid')->references('uuid')->on('orcamentos');
            $table->foreign('servico_uuid')->references('uuid')->on('servicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orcamentos_has_servicos');
    }
};
