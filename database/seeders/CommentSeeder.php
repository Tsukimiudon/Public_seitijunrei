<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //初期データ
        DB::table('comments')->insert([
            'user_id' => 2,
            'post_id' => 1,
            'title' => 'いいですね！',
            'body' => '私も神様の御用人好きなので行ってみたいです',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}