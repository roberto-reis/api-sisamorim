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
        Schema::create('clientes', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->boolean('situacao')->default(true)->comment('false = Inativo e true = Ativo');
            $table->string('nome', 100)->index();
            $table->string('email', 100)->unique()->nullable()->index();
            $table->char('cpf_cnpj', 14)->unique()->nullable()->index();
            $table->char('rg', 20)->nullable();
            $table->date('data_nascimento');
            $table->char('celular', 11)->nullable();
            $table->string('inscricao_estadual', 30)->nullable();
            $table->string('inscricao_municipal', 30)->nullable();
            $table->string('cep', 8)->nullable();
            $table->string('endereco', 150)->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('bairro', 50)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->char('uf', 2)->nullable();
            $table->longText('observacao')->nullable();
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
        Schema::dropIfExists('clientes');
    }
};
