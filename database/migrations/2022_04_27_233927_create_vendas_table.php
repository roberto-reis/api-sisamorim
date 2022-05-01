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
        Schema::create('vendas', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->foreignUuid('cliente_uuid');
            $table->foreignUuid('user_uuid');
            $table->string('situacao', 50);
            $table->string('tipo_venda', 50);
            $table->string('forma_pagamento', 50);
            $table->double('desconto_percentual', 10, 2);
            $table->double('valor_total_pedido', 10, 2);
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
        Schema::dropIfExists('vendas');
    }
};
