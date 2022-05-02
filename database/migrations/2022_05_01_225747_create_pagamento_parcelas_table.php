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
        Schema::create('pagamento_parcelas', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->foreignUuid('conta_pagar_receber_uuid')->index();
            $table->integer('parcela');
            $table->date('vencimento');
            $table->text('descricao');
            $table->boolean('quitado')->nullable();
            $table->date('data_pagamento')->index();
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
        Schema::dropIfExists('pagamento_parcelas');
    }
};
