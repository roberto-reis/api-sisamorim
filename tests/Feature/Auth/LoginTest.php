<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Infrastructure\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_deve_fazer_login()
    {
        // Arrange
        $password = '12345678';
        $user = User::factory()->create();

        // Action
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => $password,
        ]);

        // Assert
        $response->assertStatus(200);
        $this->assertAuthenticatedAs($user);
    }

    public function test_deve_falhar_ao_fazer_login_user_nao_cadastrado()
    {
        // Arrange
        $password = '12345678';
        $email = 'emailqualquer@gmail.com';

        // Action
        $response = $this->post(route('login'), [
            'email' => $email,
            'password' => $password,
        ]);

        // Assert
        $response->assertStatus(401);
    }
}
