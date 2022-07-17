<?php

namespace Tests\Feature\Fornecedor;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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
}
