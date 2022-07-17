<?php

namespace Database\Factories;

use App\Domain\Fornecedor\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FornecedorFactory extends Factory
{
    protected $model = Fornecedor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $uf = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SE', 'SP', 'TO'];

        return [
            'nome_razao_social'   => $this->faker->name,
            'email'               => $this->faker->unique()->safeEmail(),
            'cpf'                 => null,
            'cnpj'                => rand(10000000000000, 99999999999999),
            'inscricao_estadual'  => rand(10000000, 99999999),
            'inscricao_municipal' => rand(10000000, 99999999),
            'celular'             => rand(10000000000, 99999999999),
            'endereco'            => $this->faker->address,
            'numero'              => rand(1000, 9999),
            'complemento'         => $this->faker->text(20),
            'cidade'              => $this->faker->city,
            'uf'                  => $this->faker->randomElement($uf),
            'cep'                 => rand(10000000, 99999999),
            'observacao'          => $this->faker->text(150),
            'tipo_fornecedor'     => $this->faker->text(20),
            'banco'               => $this->faker->text(25),
            'agencia'             => $this->faker->randomNumber(1, 4),
            'digito_agencia'      => $this->faker->randomNumber(1, 2),
            'conta'               => $this->faker->randomNumber(1, 8),
            'digito_conta'        => $this->faker->randomNumber(1, 2),
            'tipo_conta'          => $this->faker->text(20),
            'status'              => $this->faker->boolean,
        ];
    }
}
