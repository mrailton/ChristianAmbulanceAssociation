<?php

declare(strict_types=1);

use App\Models\User;

it('renders the forgot password page', function (): void {
    $response = $this->get(route('forgot-password'));

    $response->assertOk()
        ->assertSee('Forgot Password');
});

it('redirects authenticated users to the dashboard', function (): void {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('forgot-password'));

    $response->assertRedirectToRoute('member.dashboard');
});
