<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //初期データ
        DB::table('places')->insert([
            'post_id' => 1,
            'name' => '月夜見宮',
            'caption' => '神様の御用人7巻の表紙と月夜見宮の写真',
            'address' => '〒516-0072 三重県伊勢市宮後１丁目３−１９',
            'latitude' => 34.4930502,
            'longitude' => 136.7034335,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ2
        DB::table('places')->insert([
            'post_id' => 2,
            'name' => '網走監獄',
            'caption' => 'ゴールデンカムイ第129話から引用の網走監獄と実際の網走監獄',
            'address' => '1-1 Yobito, Abashiri, Hokkaido 099-2421',
            'latitude' => 43.9952453,
            'longitude' => 144.2271999,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}