<?php

namespace Database\Factories;

use App\Infrastructure\Models\CentroCusto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CentroCustoFactory extends Factory
{
    protected $model = CentroCusto::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word,
        ];
    }
}
