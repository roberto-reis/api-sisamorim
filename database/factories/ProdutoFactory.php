<?php

namespace Database\Factories;

use App\Domain\CentroCusto\Models\CentroCusto;
use App\Domain\Produto\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProdutoFactory extends Factory
{
    protected $model = Produto::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $unidadeMedida = ['UN', 'KG', 'LT', 'PC'];

        return [
            'centro_custo_uuid' => CentroCusto::factory()->create()->uuid,
            'codigo'            => (string) $this->faker->unique()->numberBetween(1, 99999),
            'nome'              => $this->faker->name,
            'descricao'         => $this->faker->text(100),
            'unidade_medida'    => $this->faker->randomElement($unidadeMedida),
            'cor'               => $this->faker->word,
            'preco_custo'       => $this->faker->randomFloat(2, 0, 100),
            'pecentual_lucro'   => $this->faker->randomFloat(2, 0, 100),
            'estoque'           => $this->faker->randomNumber(1, 999),
            'foto_url'          => $this->faker->text(100),
        ];
    }
}
