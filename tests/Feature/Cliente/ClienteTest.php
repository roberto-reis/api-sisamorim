<?php

namespace Tests\Feature\Cliente;

use Tests\TestCase;
use App\Infrastructure\Models\User;
use App\Infrastructure\Models\Cliente;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClienteTest extends TestCase
{
    public function test_deve_estar_autenticado_para_listar_clientes()
    {   // Arrange

        // Action
        $response = $this->get(route('clientes.index'));

        // Assert
        $response->assertJson(['error' => 'Authorization Token not found'])
                ->assertStatus(401);
    }

    public function test_deve_listar_clientes()
    {
        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt('Reis@12345678'),
        ]);
        Cliente::factory()->create();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'Reis@12345678',
        ]);
        $token = $response->json('token')['access_token'];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->get(route('clientes.index'));
        // Assert
        $response->assertJsonStructure([
            'data' => [
                'data' => [
                    0 => [
                        'nome',
                        'email',
                        'cpf',
                        'cnpj',
                        'rg',
                        'data_nascimento',
                        'inscricao_estadual',
                        'inscricao_municipal',
                        'celular',
                        'cep',
                        'endereco',
                        'numero',
                        'complemento',
                        'cidade',
                        'uf',
                        'observacao',
                        'status',
                    ]
                ]
            ]
        ])->assertStatus(200);
    }

    public function test_deve_cadastrar_um_cliente()
    {
        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt('Reis@12345678'),
        ]);
        $cliente = Cliente::factory()->make();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'Reis@12345678',
        ]);
        $token = $response->json('token')['access_token'];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->post(route('clientes.store'), $cliente->toArray());

        // Assert
        $response->assertStatus(201);
        $this->assertDatabaseHas('clientes', [
            'nome' => $cliente->nome,
        ]);
    }

    public function test_deve_atualizar_um_cliente()
    {
        $this->withExceptionHandling();
        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt('Reis@12345678'),
        ]);
        $cliente = Cliente::factory()->create();
        $novoCliente = Cliente::factory()->make();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'Reis@12345678',
        ]);
        $token = $response->json('token')['access_token'];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->put(route('clientes.update', $cliente->uuid), [
                            'nome' => $novoCliente->nome,
                            'email' => $novoCliente->email,
                            'cnpj' => $novoCliente->cnpj,
                            'celular' => $novoCliente->celular,
                            'status' => $novoCliente->status,
                         ]);

        // Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('clientes', [
            'nome' => $novoCliente->nome,
            'email' => $novoCliente->email
        ]);
    }

    public function test_deve_deletar_um_cliente()
    {
        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt('Reis@12345678')
        ]);
        $clientes = Cliente::factory()->create();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'Reis@12345678',
        ]);
        $token = $response->json('token')['access_token'];

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])
                         ->delete(route('clientes.delete', $clientes->uuid));

        // Assert
        $response->assertStatus(200);
        // Ausente no Banco de dados
        $this->assertDatabaseMissing('clientes', [
            'uuid' => $clientes->uuid,
        ]);
    }
}
