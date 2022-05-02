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
        Schema::create('orcamentos_has_produtos', function (Blueprint $table) {
            $table->foreignUuid('orcamento_uuid')->index();
            $table->foreignUuid('produto_uuid')->index();
            $table->integer('quantidade');
            $table->double('valor_unitario', 10, 2);
            $table->double('valor_subtotal', 10, 2);
            $table->timestamps();

            $table->unique(['orcamento_uuid', 'produto_uuid']);

            $table->foreign('orcamento_uuid')->references('uuid')->on('orcamentos');
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
        Schema::dropIfExists('orcamentos_has_produtos');
    }
};
