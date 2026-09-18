<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('registers a valid user account', function (): void {
    $registration = [
        'name' => 'Alex Christian',
        'email' => 'alex@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ];

    $response = $this->post(route('register.post'), $registration);

    $response->assertRedirectToRoute('login')
        ->assertSessionHas('success', 'You have successfully registered your account');

    $user = User::query()->where('email', $registration['email'])->firstOrFail();

    $this->assertModelExists($user);
    expect(Hash::check($registration['password'], $user->password))->toBeTrue();
});

it('rejects an invalid registration', function (): void {
    $response = $this->from(route('register'))
        ->post(route('register.post'), [
            'name' => 'Al',
            'email' => 'not-an-email',
            'password' => 'short',
            'password_confirmation' => 'different',
        ]);

    $response->assertRedirectToRoute('register')
        ->assertSessionHasErrors(['name', 'email', 'password']);

    $this->assertDatabaseCount('users', 0);
});
