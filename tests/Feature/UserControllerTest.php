<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it can list users', function () {
    User::factory()->count(5)->create();

    $response = $this->get('/users');

    $response->assertStatus(200);
    $response->assertViewIs('users.index');
    $response->assertViewHas('users');
});

test('it can show a user', function () {
    $user = User::factory()->create();

    $response = $this->get("/users/{$user->id}");

    $response->assertStatus(200);
    $response->assertViewIs('users.show');
    expect($response->getContent())->toContain($user->name);
});

test('it can create a user', function () {
    $userData = [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ];

    $response = $this->post('/users', $userData);

    $response->assertRedirect();
    $this->assertDatabaseHas('users', [
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]);
});

test('it validates required fields when creating user', function () {
    $response = $this->post('/users', []);

    $response->assertSessionHasErrors(['name', 'email', 'password']);
});
