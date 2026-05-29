<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->withSession(['_token' => 'test-token'])->post('/register', [
            'name' => 'Test User',
            'email' => 'Test.User@Example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            '_token' => 'test-token',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
        $this->assertDatabaseHas(User::class, [
            'email' => 'test.user@example.com',
        ]);
    }
}
