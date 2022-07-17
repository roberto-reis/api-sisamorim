<?php

namespace Tests\Feature\Fornecedor;

use Tests\TestCase;
use App\Domain\User\Models\User;
use App\Domain\Fornecedor\Models\Fornecedor;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FornecedorTest extends TestCase
{

    public function test_deve_estar_autenticado_para_listar_fornecedor()
    {   // Arrange

        // Action
        $response = $this->get(route('fornecedor.index'));

        // Assert
        $response->assertJson(['error' => 'Authorization Token not found'])
                ->assertStatus(401);
    }

    public function test_deve_listar_fornecedor()
    {
        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt('Reis@12345678'),
        ]);
        Fornecedor::factory()->create();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'Reis@12345678',
        ]);
        $token = $response->json('token')['access_token'];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->get(route('fornecedor.index'));
        // Assert
        $response->assertJsonStructure([
            'data' => [
                'data' => [
                    0 => [
                        'uuid',
                        'nome_razao_social',
                        'email',
                        'cpf',
                        'cnpj',
                        'inscricao_estadual',
                        'inscricao_municipal',
                        'celular',
                        'cep',
                        'endereco',
                        'numero',
                        'complemento',
                        'bairro',
                        'cidade',
                        'uf',
                        'observacao',
                        'tipo_fornecedor',
                        'banco',
                        'agencia',
                        'digito_agencia',
                        'conta',
                        'digito_conta',
                        'tipo_conta',
                        'status',
                        'created_at',
                        'updated_at',
                    ]
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_deve_cadastrar_fornecedor()
    {
        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt('Reis@12345678'),
        ]);
        $fornecedor = Fornecedor::factory()->make();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'Reis@12345678',
        ]);
        $token = $response->json('token')['access_token'];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->post(route('fornecedor.store'), $fornecedor->toArray());

        // Assert
        $response->assertStatus(201);
        $this->assertDatabaseHas('fornecedores', [
            'cnpj' => $fornecedor->cnpj,
        ]);
    }
}
