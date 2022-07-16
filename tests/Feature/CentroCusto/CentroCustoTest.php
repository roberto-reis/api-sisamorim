<?php

namespace Tests\Feature\CentroCusto;

use Tests\TestCase;
use App\Domain\User\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use App\Domain\CentroCusto\Models\CentroCusto;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CentroCustoTest extends TestCase
{
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
}
