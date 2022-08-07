<?php

namespace Tests\Feature\CentroCusto;

use Tests\TestCase;
use App\Infrastructure\Models\User;
use App\Infrastructure\Models\CentroCusto;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CentroCustoTest extends TestCase
{
    use RefreshDatabase;

    public function test_deve_estar_autenticado_para_listar_centro_de_custo()
    {   // Arrange

        // Action
        $response = $this->get(route('centro-custo.index'));

        // Assert
        $response->assertJson(['error' => 'Authorization Token not found'])
                ->assertStatus(401);
    }

    public function test_deve_listar_centro_de_custo()
    {
        // Arrange
        $user = User::factory()->create();
        $centroCusto = CentroCusto::factory()->create();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => '12345678',
        ]);
        $token = $response->json('token')['access_token'];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->get(route('centro-custo.index'));

        // Assert
        $response->assertJson([
            'data' => [
                'data' => [
                    0 => [
                        'uuid' => $centroCusto->uuid,
                        'nome' => $centroCusto->nome,
                    ],
                ],
            ],
        ])->assertStatus(200);
    }

    public function test_deve_cadastrar_centro_de_custo()
    {
        // Arrange
        $user = User::factory()->create();
        $centroCusto = CentroCusto::factory()->make();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => '12345678',
        ]);
        $token = $response->json('token')['access_token'];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->post(route('centro-custo.store'), [
                            'nome' => $centroCusto->nome,
                         ]);

        // Assert
        $response->assertStatus(201);
        $this->assertDatabaseHas('centro_custos', [
            'nome' => $centroCusto->nome,
        ]);
    }

    public function test_deve_atualizar_centro_de_custo()
    {
        // Arrange
        $user = User::factory()->create();
        $centroCusto = CentroCusto::factory()->create();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => '12345678',
        ]);
        $token = $response->json('token')['access_token'];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->put(route('centro-custo.update', $centroCusto->uuid), [
                            'nome' => 'Novo nome',
                         ]);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('centro_custos', [
            'nome' => 'Novo nome',
        ]);
    }

    public function test_deve_deletar_centro_de_custo()
    {
        // Arrange
        $user = User::factory()->create();
        $centroCusto = CentroCusto::factory()->create();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => '12345678',
        ]);
        $token = $response->json('token')['access_token'];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->delete(route('centro-custo.delete', $centroCusto->uuid));

        // Assert
        $response->assertStatus(200);
        // Ausente no Banco de dados
        $this->assertDatabaseMissing('centro_custos', [
            'uuid' => $centroCusto->uuid,
        ]);
    }
}
