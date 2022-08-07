<?php

namespace Tests\Feature\Fornecedor;

use Tests\TestCase;
use App\Infrastructure\Models\User;
use App\Infrastructure\Models\Fornecedor;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FornecedorTest extends TestCase
{
    use RefreshDatabase;

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
                        'status_uuid',
                        'tipo_cadastro_uuid',
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
                        'banco',
                        'agencia',
                        'digito_agencia',
                        'conta',
                        'digito_conta',
                        'tipo_conta',
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
            'nome_razao_social' => $fornecedor->nome_razao_social,
            'email' => $fornecedor->email,
        ]);
    }

    public function test_deve_atualizar_fornecedor()
    {
        $this->withExceptionHandling();
        // Arrange
        $user = User::factory()->create();
        $fornecedor = Fornecedor::factory()->create();
        $novoFornecedor = Fornecedor::factory()->make();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => '12345678',
        ]);
        $token = $response->json('token')['access_token'];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->put(route('fornecedor.update', $fornecedor->uuid), [
                            'status_uuid' => $novoFornecedor->status_uuid,
                            'tipo_cadastro_uuid' => $novoFornecedor->tipo_cadastro_uuid,
                            'nome_razao_social' => $novoFornecedor->nome_razao_social,
                            'email' => $novoFornecedor->email,
                            'cnpj' => $novoFornecedor->cnpj,
                            'celular' => $novoFornecedor->celular,
                         ]);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('fornecedores', [
            'nome_razao_social' => $novoFornecedor->nome_razao_social,
            'email' => $novoFornecedor->email
        ]);
    }

    public function test_deve_deletar_fornecedor()
    {
        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt('Reis@12345678')
        ]);
        $fornecedor = Fornecedor::factory()->create();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'Reis@12345678',
        ]);
        $token = $response->json('token')['access_token'];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->delete(route('fornecedor.delete', $fornecedor->uuid));

        // Assert
        $response->assertStatus(200);
        // Ausente no Banco de dados
        $this->assertDatabaseMissing('fornecedores', [
            'uuid' => $fornecedor->uuid,
        ]);
    }
}
