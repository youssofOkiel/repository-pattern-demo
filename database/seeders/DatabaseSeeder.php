<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $topics = Topic::factory()
            ->count(5)
            ->for($user)
            ->create();

        $topics->each(function ($topic) use ($user) {
            Post::factory()
                ->count(5)
                ->for($user)
                ->create([
                    'topic_id' => $topic->getKey()
                ]);
        });
    }
}
