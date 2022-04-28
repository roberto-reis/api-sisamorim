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
            $table->uuid()->primary();
            $table->uuid('cliente_uuid');
            $table->uuid('user_uuid');
            $table->string('situacao', 50);
            $table->string('tipo_venda', 50);
            $table->string('forma_pagamento', 50);
            $table->decimal('desconto_percentual', 10, 2);
            $table->decimal('valor_total_pedido', 10, 2);
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
        Schema::dropIfExists('vendas');
    }
};
