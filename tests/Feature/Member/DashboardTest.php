<?php

declare(strict_types=1);

use App\Models\User;

it('redirects guests to the login page', function (): void {
    $response = $this->get(route('member.dashboard'));

    $response->assertRedirectToRoute('login');
});

it('renders the dashboard for authenticated users', function (): void {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('member.dashboard'));

    $response->assertOk()
        ->assertSee('Welcome to your member dashboard');
});
