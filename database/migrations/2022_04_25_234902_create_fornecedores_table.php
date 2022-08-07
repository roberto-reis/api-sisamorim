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
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->foreignUuid('status_uuid')->index();
            $table->foreignUuid('tipo_cadastro_uuid')->index();
            $table->string('nome_razao_social', 150)->index();
            $table->string('email', 150)->unique();
            $table->char('cpf', 11)->unique()->nullable();
            $table->char('rg', 20)->nullable();
            $table->char('cnpj', 14)->unique()->nullable();
            $table->string('inscricao_estadual', 30)->nullable();
            $table->string('inscricao_municipal', 30)->nullable();
            $table->char('celular', 11);
            $table->string('cep', 8)->nullable();
            $table->string('endereco', 150)->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('bairro', 50)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->char('uf', 2)->nullable();
            $table->text('observacao')->nullable();
            $table->string('banco', 50)->nullable();
            $table->integer('agencia')->nullable();
            $table->integer('digito_agencia')->nullable();
            $table->integer('conta')->nullable();
            $table->integer('digito_conta')->nullable();
            $table->string('tipo_conta')->nullable();
            $table->timestamps();

            $table->foreign('status_uuid')->references('uuid')->on('status');
            $table->foreign('tipo_cadastro_uuid')->references('uuid')->on('tipos_cadastros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedores');
    }
};
