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
        Schema::create('contas_pagar_receber', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->foreignUuid('cliente_uuid')->index();
            $table->foreignUuid('fornecedor_uuid')->index();
            $table->foreignUuid('centro_custo_uuid')->index();
            $table->foreignUuid('forma_pagamento_uuid')->index();
            $table->string('tipo', 50)->index();
            $table->date('vencimento')->index();
            $table->text('descricao');
            $table->string('entidade', 50);
            $table->double('valor_liquido', 10, 2);
            $table->double('juros', 10, 2)->nullable();
            $table->double('valor_bruto', 10, 2)->nullable();
            $table->boolean('pagamento_quitado')->nullable();
            $table->date('data_pagamento')->index();
            $table->longText('observacao')->nullable();
            $table->integer('quantidade_parcela')->nullable();
            $table->string('arquivo_url', 150);
            $table->timestamps();

            $table->foreign('cliente_uuid')->references('uuid')->on('clientes');
            $table->foreign('fornecedor_uuid')->references('uuid')->on('fornecedores');
            $table->foreign('centro_custo_uuid')->references('uuid')->on('centro_custos');
            $table->foreign('forma_pagamento_uuid')->references('uuid')->on('forma_pagamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contas_pagar_receber');
    }
};
