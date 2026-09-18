<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

it('resets a user password with a valid token', function (): void {
    $user = User::factory()->create([
        'email' => 'member@example.com',
        'password' => 'old-password',
    ]);
    $token = Password::broker()->createToken($user);

    $response = $this->post(route('password.store'), [
        'token' => $token,
        'email' => $user->email,
        'password' => 'new-password',
        'password_confirmation' => 'new-password',
    ]);

    $response->assertRedirectToRoute('login')
        ->assertSessionHas('success', 'Your password has been reset, please login');

    expect(Hash::check('new-password', $user->refresh()->password))->toBeTrue();
});

it('rejects a password reset with an invalid token', function (): void {
    $user = User::factory()->create([
        'email' => 'member@example.com',
        'password' => 'old-password',
    ]);

    $response = $this->from(route('password.reset'))
        ->post(route('password.store'), [
            'token' => 'invalid-token',
            'email' => $user->email,
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

    $response->assertRedirectToRoute('password.reset')
        ->assertSessionHas('error', 'There was an issue resetting your password, please try again');

    expect(Hash::check('old-password', $user->refresh()->password))->toBeTrue();
});
