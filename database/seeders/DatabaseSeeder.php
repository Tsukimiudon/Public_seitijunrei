<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        //初期データ挿入
        $this->call([
            UserSeeder::class,
            WorkSeeder::class,
            PostSeeder::class,
            PlaceSeeder::class,
            ImageSeeder::class,
            BookmarkSeeder::class,
            CommentSeeder::class,
            ]);
    }
}