<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //初期データ
        DB::table('posts')->insert([
            'user_id' => 1,
            'work_id' => 1,
            'title' => '月読神社に行ってきた',
            'body' => '伊勢にある月読神社に行ってきました～！',
            'eyecatch_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1723703507/HORIZON_0001_BURST20211008143411569_COVER_jj8xxm.jpg',
            'created_at' => new DateTime(),
            'updated_at' => null,
            ]);
        //初期データ2
        DB::table('posts')->insert([
            'user_id' => 2,
            'work_id' => 2,
            'title' => '最果ての監獄に行ってきた',
            'body' => '漫画・ゴールデンカムイにて、大量の囚人が収監されていた網走監獄。寒い北国の監獄を夏休み中に訪れました。',
            'eyecatch_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1724143080/DSC_1381_ewworw.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ2
        DB::table('posts')->insert([
            'user_id' => 3,
            'work_id' => 2,
            'title' => 'テストユーザーによる投稿',
            'body' => '漫画・ゴールデンカムイにて、大量の囚人が収監されていた網走監獄。寒い北国の監獄を夏休み中に訪れました。',
            'eyecatch_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1724143080/DSC_1381_ewworw.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}