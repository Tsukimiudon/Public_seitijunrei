<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //初期データ
        DB::table('bookmarks')->insert([
            'user_id' => 2,
            'post_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}