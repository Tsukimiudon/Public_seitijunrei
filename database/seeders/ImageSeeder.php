<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //初期データ
        DB::table('images')->insert([
            'place_id' => 1,
            'post_id' => 1,
            'real_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1723703507/HORIZON_0001_BURST20211008143411569_COVER_jj8xxm.jpg',
            'anime_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1723704305/X_p2kocw.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ2
        DB::table('images')->insert([
            'place_id' => 2,
            'post_id' => 2,
            'real_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1724143080/DSC_1381_ewworw.jpg',
            'anime_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1724143079/goldenKAMUI9_lzwozm.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}