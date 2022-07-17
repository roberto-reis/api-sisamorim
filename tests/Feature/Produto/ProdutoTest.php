<?php

namespace Tests\Feature\Produto;

use App\Domain\Produto\Models\Produto;
use Tests\TestCase;
use App\Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProdutoTest extends TestCase
{

    public function test_deve_estar_autenticado_para_listar_produto()
    {
        // Arrange

        // Action
        $response = $this->get(route('produto.index'));

        // Assert
        $response->assertJson(['error' => 'Authorization Token not found'])
                ->assertStatus(401);
    }

    public function test_deve_listar_produto()
    {
        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt('Reis@12345678'),
        ]);
        Produto::factory()->create();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'Reis@12345678',
        ]);
        $token = $response->json('token')['access_token'];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->get(route('produto.index'));
        // Assert
        $response->assertJsonStructure([
            'data' => [
                'data' => [
                    0 => [
                        'uuid',
                        'centro_custo_uuid',
                        'codigo',
                        'nome',
                        'descricao',
                        'unidade_medida',
                        'cor',
                        'preco_custo',
                        'estoque',
                        'foto_url',
                        'created_at',
                        'updated_at',
                    ]
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_deve_cadastrar_produto()
    {
        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt('Reis@12345678'),
        ]);
        $produto = Produto::factory()->make();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'Reis@12345678',
        ]);
        $token = $response->json('token')['access_token'];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->post(route('produto.store'), $produto->toArray());

        // Assert
        $response->assertStatus(201);
        $this->assertDatabaseHas('produtos', [
            'nome' => $produto->nome,
        ]);
    }

    public function test_deve_atualizar_produto()
    {
        $this->withExceptionHandling();
        // Arrange
        $user = User::factory()->create();
        $produto = Produto::factory()->create();
        $novoProduto = Produto::factory()->make();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => '12345678',
        ]);
        $token = $response->json('token')['access_token'];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->put(route('produto.update', $produto->uuid), [
                            'nome' => $novoProduto->nome,
                            'codigo' => $novoProduto->codigo,
                            'descricao' => $novoProduto->descricao,
                            'unidade_medida' => $novoProduto->unidade_medida,
                            'centro_custo_uuid' => $novoProduto->centro_custo_uuid,
                         ]);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('produtos', [
            'nome' => $novoProduto->nome,
            'codigo' => $novoProduto->codigo
        ]);
    }
}
