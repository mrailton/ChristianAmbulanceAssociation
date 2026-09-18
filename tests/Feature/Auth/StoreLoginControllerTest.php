<?php

declare(strict_types=1);

use App\Models\User;

it('rejects invalid credentials', function (): void {
    $user = User::factory()->create([
        'email' => 'member@example.com',
        'password' => 'password',
    ]);

    $response = $this->from(route('login'))
        ->post(route('login.post'), [
            'email' => $user->email,
            'password' => 'incorrect-password',
        ]);

    $response->assertRedirectToRoute('login')
        ->assertSessionHasErrors([
            'password' => 'We were unable to authenticate you using the provided credentials',
        ]);

    $this->assertGuest();
});

it('logs in a user and redirects to the dashboard', function (): void {
    $user = User::factory()->create([
        'email' => 'member@example.com',
        'password' => 'password',
    ]);

    $response = $this->post(route('login.post'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertRedirectToRoute('member.dashboard')
        ->assertSessionHas('success', 'You have successfully logged in.');

    $this->assertAuthenticatedAs($user);
});
