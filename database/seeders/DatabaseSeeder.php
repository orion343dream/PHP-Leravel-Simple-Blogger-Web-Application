<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 users with 0 posts initially
        \App\Models\User::factory(10)->create();

        // Create a specific admin user
        $admin = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        // Create only 5 demo posts total with comments
        \App\Models\Post::factory(5)
            ->published()
            ->has(\App\Models\Comment::factory(3))
            ->create();
    }
}
