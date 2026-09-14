<?php

declare(strict_types=1);

test('the homepage loads properly', function (): void {
    $response = $this->get(route('index'));

    $response->assertStatus(200)
        ->assertSee('Supporting Christian ambulance people.');
});
