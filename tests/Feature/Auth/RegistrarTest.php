<?php

namespace Tests\Feature\Auth;

use App\Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrarTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_deve_cadastrar_e_logar_usuario()
    {
        // Arrange
        $usuario = [
            'first_name' => 'Roberto',
            'last_name' => 'Reis',
            'email' => 'usuario@gmail.com',
            'password' => 'Reis@12345678',
            'password_confirmation' => 'Reis@12345678',
        ];

        // Action
        $response = $this->post(route('register'), $usuario);

        // Assert
        $response->assertStatus(201);
    }

    public function test_deve_ser_obrigatorios_os_campos_no_cadatro()
    {
        // Arrange
        $usuario = [
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',
        ];

        // Action
        $response = $this->post(route('register'), $usuario);

        // Assert
        $response->assertSessionHasErrors(['first_name', 'last_name', 'email', 'password'])
            ->assertStatus(302);

    }

    public function test_deve_ser_valido_o_email_no_cadastro()
    {
        // Arrange
        $usuario = [
            'first_name' => 'Roberto',
            'last_name' => 'Reis',
            'email' => 'usuariogmail.com',
            'password' => 'Reis@12345678',
            'password_confirmation' => 'Reis@12345678',
        ];

        // Action
        $response = $this->post(route('register'), $usuario);

        // Assert
        $response->assertSessionHasErrors([
            'email' => 'O campo email deve ser um email válido',
        ])->assertStatus(302);
    }

    public function test_deve_unico_o_email_no_cadastro()
    {
        // Arrange
        $user = User::factory()->create();
        $usuario = [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'password' => 'Reis@12345678',
            'password_confirmation' => 'Reis@12345678',
        ];

        // Action
        $response = $this->post(route('register'), $usuario);

        // Assert
        $response->assertSessionHasErrors(['email' => 'O email informado já está cadastrado'])
            ->assertStatus(302);
    }

    public function test_deve_ser_valido_o_password_no_cadastro()
    {
        // Arrange
        $usuario = [
            'first_name' => 'Roberto',
            'last_name' => 'Reis',
            'email' => 'usuariogmail.com',
            'password' => '1234567',
            'password_confirmation' => '1234567',
        ];

        // Action
        $response = $this->post(route('register'), $usuario);

        // Assert
        $response->assertSessionHasErrors(['password'])->assertStatus(302);

    }
}
