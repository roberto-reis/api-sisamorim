<?php

namespace Database\Factories;

use App\Domain\Cliente\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClienteFactory extends Factory
{
    protected $model = Cliente::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $uf = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SE', 'SP', 'TO'];

        return [
            'nome'                => $this->faker->name,
            'email'               => $this->faker->email,
            'cpf'                 => null,
            'cnpj'                => (string) rand(10000000000000, 99999999999999),
            'rg'                  => (string) rand(10000000, 99999999),
            'data_nascimento'     => $this->faker->date(),
            'inscricao_estadual'  => (string) rand(10000000, 99999999),
            'inscricao_municipal' => (string) rand(10000000, 99999999),
            'celular'             => (string) rand(10000000000, 99999999999),
            'cep'                 => (string) rand(10000000, 99999999),
            'endereco'            => $this->faker->address,
            'numero'              => (string) rand(1000, 9999),
            'complemento'         => $this->faker->text(20),
            'cidade'              => $this->faker->city,
            'uf'                  => $this->faker->randomElement($uf),
            'observacao'          => $this->faker->text(150),
            'status'              => $this->faker->boolean,
        ];
    }
}
