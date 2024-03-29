<?php

namespace Database\Factories;

use App\Infrastructure\Models\Status;
use App\Infrastructure\Models\Fornecedor;
use App\Infrastructure\Models\TipoCadastro;
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
        $uf = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG',
                'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO','RR', 'SC', 'SE', 'SP', 'TO'];

        $tipoCadatro = TipoCadastro::all()->random();

        return [
            'status_uuid'         => Status::all()->random()->uuid,
            'tipo_cadastro_uuid'  => $tipoCadatro->uuid,
            'nome_razao_social'   => $this->faker->name,
            'email'               => $this->faker->unique()->safeEmail(),
            'cpf'                 => $tipoCadatro->nome == 'pessoa-fisica' ? (string)rand(10000000, 99999999) : null,
            'cnpj'                => $tipoCadatro->nome == 'pessoa-juridica' ? (string)rand(10000000000000, 99999999999999) : null,
            'inscricao_estadual'  => (string) rand(10000000, 99999999),
            'inscricao_municipal' => (string) rand(10000000, 99999999),
            'celular'             => (string) rand(10000000000, 99999999999),
            'endereco'            => $this->faker->address,
            'numero'              => (string) rand(1000, 9999),
            'complemento'         => $this->faker->text(20),
            'cidade'              => $this->faker->city,
            'uf'                  => $this->faker->randomElement($uf),
            'cep'                 => (string) rand(10000000, 99999999),
            'observacao'          => $this->faker->text(150),
            'banco'               => $this->faker->text(25),
            'agencia'             => $this->faker->randomNumber(1, 4),
            'digito_agencia'      => $this->faker->randomNumber(1, 2),
            'conta'               => $this->faker->randomNumber(1, 8),
            'digito_conta'        => $this->faker->randomNumber(1, 2),
            'tipo_conta'          => $this->faker->text(20)
        ];
    }
}
