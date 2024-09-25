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
        //初期データ3
        DB::table('posts')->insert([
            'user_id' => 3,
            'work_id' => 2,
            'title' => 'テストユーザーによる投稿',
            'body' => 'サンプルです。',
            'eyecatch_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1724143080/DSC_1381_ewworw.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ4
        DB::table('posts')->insert([
            'user_id' => 4,
            'work_id' => 3,
            'title' => '千と千尋の神隠し',
            'body' => '台湾に行ってきました。千と千尋の神隠しの聖地として有名な九份は夜景がとてもきれいでした',
            'eyecatch_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1725725180/PXL_20230907_102610662.MP_wddnsz.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ5
        DB::table('posts')->insert([
            'user_id' => 3,
            'work_id' => 1,
            'title' => 'サンプル',
            'body' => 'サンプルです。',
            'eyecatch_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/eyecatch_sample_wnekri.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ6
        DB::table('posts')->insert([
            'user_id' => 3,
            'work_id' => 1,
            'title' => 'サンプル',
            'body' => 'サンプルです。',
            'eyecatch_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/eyecatch_sample_wnekri.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ7
        DB::table('posts')->insert([
            'user_id' => 3,
            'work_id' => 1,
            'title' => 'サンプル',
            'body' => 'サンプルです。',
            'eyecatch_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/eyecatch_sample_wnekri.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ8
        DB::table('posts')->insert([
            'user_id' => 3,
            'work_id' => 1,
            'title' => 'サンプル',
            'body' => 'サンプルです。',
            'eyecatch_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/eyecatch_sample_wnekri.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ9
        DB::table('posts')->insert([
            'user_id' => 3,
            'work_id' => 1,
            'title' => 'サンプル',
            'body' => 'サンプルです。',
            'eyecatch_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/eyecatch_sample_wnekri.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ10
        DB::table('posts')->insert([
            'user_id' => 3,
            'work_id' => 1,
            'title' => 'サンプル',
            'body' => 'サンプルです。',
            'eyecatch_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/eyecatch_sample_wnekri.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ11
        DB::table('posts')->insert([
            'user_id' => 3,
            'work_id' => 1,
            'title' => 'サンプル',
            'body' => 'サンプルです。',
            'eyecatch_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/eyecatch_sample_wnekri.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ12
        DB::table('posts')->insert([
            'user_id' => 3,
            'work_id' => 1,
            'title' => 'サンプル',
            'body' => 'サンプルです。',
            'eyecatch_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/eyecatch_sample_wnekri.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}