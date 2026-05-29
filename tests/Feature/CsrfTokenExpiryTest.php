<?php

namespace Tests\Feature;

use Tests\TestCase;

class CsrfTokenExpiryTest extends TestCase
{
    public function test_expired_csrf_token_redirects_back_without_errors(): void
    {
        $response = $this
            ->from('/login')
            ->post('/login', [
                '_token' => 'expired-token',
                'email' => 'student@example.com',
                'password' => 'password',
            ]);

        $response
            ->assertRedirect('/login')
            ->assertSessionMissing('errors')
            ->assertSessionMissing('error');
    }
}
