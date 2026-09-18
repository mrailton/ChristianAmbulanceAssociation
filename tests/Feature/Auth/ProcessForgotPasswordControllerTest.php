<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;

it('sends a password reset link to an existing user', function (): void {
    $user = User::factory()->create([
        'email' => 'member@example.com',
    ]);
    Notification::fake();

    $response = $this->post(route('forgot-password.post'), [
        'email' => $user->email,
    ]);

    $response->assertRedirect()
        ->assertSessionHas('info', 'We have e-mailed your password reset link!');

    Notification::assertSentTo($user, ResetPassword::class);
});

it('rejects a password reset request for an unknown email address', function (): void {
    $response = $this->from(route('forgot-password'))
        ->post(route('forgot-password.post'), [
            'email' => 'missing@example.com',
        ]);

    $response->assertRedirectToRoute('forgot-password')
        ->assertSessionHasErrors('email');
});
