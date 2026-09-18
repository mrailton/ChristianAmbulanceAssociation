<?php

declare(strict_types=1);

it('renders the reset password page with the reset details', function (): void {
    $response = $this->get(route('password.reset', [
        'token' => 'reset-token',
        'email' => 'member@example.com',
    ]));

    $response->assertOk()
        ->assertSee('Reset your password')
        ->assertSee('value="reset-token"', false)
        ->assertSee('value="member@example.com"', false);
});
