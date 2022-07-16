<?php

namespace Tests\Feature\CentroCusto;

use Tests\TestCase;
use App\Domain\User\Models\User;
use App\Domain\CentroCusto\Models\CentroCusto;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CentroCustoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_deve_listar_centro_de_custo()
    {
        $this->withExceptionHandling();
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


}
