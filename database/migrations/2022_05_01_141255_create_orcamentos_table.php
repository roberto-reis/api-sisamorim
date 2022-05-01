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
        Schema::create('orcamentos', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->foreignUuid('cliente_uuid');
            $table->foreignUuid('user_uuid');
            $table->longText('observacao')->nullable();
            $table->string('forma_pagamento', 50);
            $table->double('desconto_percentual', 10, 2)->nullable();
            $table->integer('numero_parcela')->nullable();
            $table->double('valor_total', 10, 2);
            $table->boolean('enviar_email')->nullable()->comment('false = Não e true = Sim');
            $table->string('canal_venda', 100);
            $table->timestamp('validade');
            $table->timestamps();

            $table->foreign('cliente_uuid')->references('uuid')->on('clientes');
            $table->foreign('user_uuid')->references('uuid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orcamentos');
    }
};
