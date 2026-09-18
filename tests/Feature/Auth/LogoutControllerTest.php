<?php

declare(strict_types=1);

use App\Models\User;

it('logs out an authenticated user', function (): void {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('logout'));

    $response->assertRedirectToRoute('index')
        ->assertSessionHas('success', 'You have been logged out!');

    $this->assertGuest();
});
