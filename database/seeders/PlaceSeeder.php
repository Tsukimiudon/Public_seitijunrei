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
        //初期データ3
        DB::table('places')->insert([
            'post_id' => 3,
            'name' => '網走監獄',
            'caption' => 'ゴールデンカムイ第129話から引用の網走監獄と実際の網走監獄',
            'address' => '1-1 Yobito, Abashiri, Hokkaido 099-2421',
            'latitude' => 43.9952453,
            'longitude' => 144.2271999,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ4
        DB::table('places')->insert([
            'post_id' => 4,
            'name' => '九份',
            'caption' => '九份の夜景です',
            'address' => 'Ruifang District New Taipei City, Taiwan 224',
            'latitude' => 35.3929344,
            'longitude' => 127.6745817,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ5
        DB::table('places')->insert([
            'post_id' => 5,
            'name' => 'サンプル',
            'caption' => '地図のキャプションのサンプルです',
            'address' => 'サンプル',
            'latitude' => 35.6585848,
            'longitude' => 139.742858,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ6
        DB::table('places')->insert([
            'post_id' => 6,
            'name' => 'サンプル',
            'caption' => '地図のキャプションのサンプルです',
            'address' => 'サンプル',
            'latitude' => 35.6585848,
            'longitude' => 139.742858,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ7
        DB::table('places')->insert([
            'post_id' => 7,
            'name' => 'サンプル',
            'caption' => '地図のキャプションのサンプルです',
            'address' => 'サンプル',
            'latitude' => 35.6585848,
            'longitude' => 139.742858,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ8
        DB::table('places')->insert([
            'post_id' => 8,
            'name' => 'サンプル',
            'caption' => '地図のキャプションのサンプルです',
            'address' => 'サンプル',
            'latitude' => 35.6585848,
            'longitude' => 139.742858,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ9
        DB::table('places')->insert([
            'post_id' => 9,
            'name' => 'サンプル',
            'caption' => '地図のキャプションのサンプルです',
            'address' => 'サンプル',
            'latitude' => 35.6585848,
            'longitude' => 139.742858,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ10
        DB::table('places')->insert([
            'post_id' => 10,
            'name' => 'サンプル',
            'caption' => '地図のキャプションのサンプルです',
            'address' => 'サンプル',
            'latitude' => 35.6585848,
            'longitude' => 139.742858,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ11
        DB::table('places')->insert([
            'post_id' => 11,
            'name' => 'サンプル',
            'caption' => '地図のキャプションのサンプルです',
            'address' => 'サンプル',
            'latitude' => 35.6585848,
            'longitude' => 139.742858,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ12
        DB::table('places')->insert([
            'post_id' => 12,
            'name' => 'サンプル',
            'caption' => '地図のキャプションのサンプルです',
            'address' => 'サンプル',
            'latitude' => 35.6585848,
            'longitude' => 139.742858,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}