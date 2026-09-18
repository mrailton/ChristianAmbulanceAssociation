<?php

declare(strict_types=1);

use App\Models\User;

it('renders the registration page', function (): void {
    $response = $this->get(route('register'));

    $response->assertOk()
        ->assertSee('Register an account');
});

it('redirects authenticated users to the dashboard', function (): void {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('register'));

    $response->assertRedirectToRoute('member.dashboard');
});
