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
        Schema::create('vendas_has_produtos', function (Blueprint $table) {
            $table->foreignUuid('venda_uuid')->index();
            $table->foreignUuid('produto_uuid')->index();
            $table->double('quantidade', 10, 2);
            $table->double('desconto_percentual', 10, 2);
            $table->double('valor_subtotal', 10, 2);
            $table->timestamps();

            $table->unique(['venda_uuid', 'produto_uuid']);

            $table->foreign('venda_uuid')->references('uuid')->on('vendas');
            $table->foreign('produto_uuid')->references('uuid')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas_has_produtos');
    }
};
