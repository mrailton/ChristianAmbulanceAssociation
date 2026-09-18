<?php

declare(strict_types=1);

use App\Models\User;

it('renders the login page', function (): void {
    $response = $this->get(route('login'));

    $response->assertOk()
        ->assertSee('Sign in to your account');
});

it('redirects authenticated users to the dashboard', function (): void {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('login'));

    $response->assertRedirectToRoute('member.dashboard');
});
