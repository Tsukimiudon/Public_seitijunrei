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
        //初期データ3
        DB::table('images')->insert([
            'place_id' => 3,
            'post_id' => 3,
            'real_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1724143080/DSC_1381_ewworw.jpg',
            'anime_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1724143079/goldenKAMUI9_lzwozm.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ4
        DB::table('images')->insert([
            'place_id' => 4,
            'post_id' => 4,
            'real_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261368/PXL_20240315_101421169.NIGHT_duyhdr.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ5
        DB::table('images')->insert([
            'place_id' => 5,
            'post_id' => 5,
            'real_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/real_image_sample_vk5v4o.png',
            'anime_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/anime_image_sample_qi04so.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ6
        DB::table('images')->insert([
            'place_id' => 6,
            'post_id' => 6,
            'real_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/real_image_sample_vk5v4o.png',
            'anime_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/anime_image_sample_qi04so.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ7
        DB::table('images')->insert([
            'place_id' => 7,
            'post_id' => 7,
            'real_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/real_image_sample_vk5v4o.png',
            'anime_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/anime_image_sample_qi04so.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ8
        DB::table('images')->insert([
            'place_id' => 8,
            'post_id' => 8,
            'real_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/real_image_sample_vk5v4o.png',
            'anime_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/anime_image_sample_qi04so.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ9
        DB::table('images')->insert([
            'place_id' => 9,
            'post_id' => 9,
            'real_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/real_image_sample_vk5v4o.png',
            'anime_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/anime_image_sample_qi04so.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ10
        DB::table('images')->insert([
            'place_id' => 10,
            'post_id' => 10,
            'real_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/real_image_sample_vk5v4o.png',
            'anime_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/anime_image_sample_qi04so.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ11
        DB::table('images')->insert([
            'place_id' => 11,
            'post_id' => 11,
            'real_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/real_image_sample_vk5v4o.png',
            'anime_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/anime_image_sample_qi04so.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ12
        DB::table('images')->insert([
            'place_id' => 12,
            'post_id' => 12,
            'real_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/real_image_sample_vk5v4o.png',
            'anime_image_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1727261365/anime_image_sample_qi04so.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}