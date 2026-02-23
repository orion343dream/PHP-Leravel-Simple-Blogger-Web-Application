<?php

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('user has posts relationship', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $user->id]);

    expect($user->posts->contains($post))->toBeTrue();
});

test('user has comments relationship', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();
    $comment = Comment::factory()->create([
        'user_id' => $user->id,
        'post_id' => $post->id,
    ]);

    expect($user->comments->contains($comment))->toBeTrue();
});

test('it checks if user is admin', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $user = User::factory()->create(['role' => 'user']);

    expect($admin->isAdmin())->toBeTrue();
    expect($user->isAdmin())->toBeFalse();
});

test('it checks if user is editor', function () {
    $editor = User::factory()->create(['role' => 'editor']);
    $user = User::factory()->create(['role' => 'user']);

    expect($editor->isEditor())->toBeTrue();
    expect($user->isEditor())->toBeFalse();
});
