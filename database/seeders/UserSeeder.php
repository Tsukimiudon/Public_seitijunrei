<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //初期データ追加
        DB::table('users')->insert([
            'name' => '管理人',
            'email' => Str::random(10) . '@gmail.com',
            'password' => Hash::make('password'),
            'introduction' => 'よろしくお願いします',
            'icon_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1723685503/cld-sample-5.jpg',
            'administrator' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ追加
        DB::table('users')->insert([
            'name' => 'Neko',
            'email' => 'neko@gmail.com',
            'password' => Hash::make('password'),
            'introduction' => 'Nekoです。よろしくお願いします',
            'icon_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1724143344/nekocyanPAKE4498-429_TP_V4_czmziw.jpg',
            'administrator' => 0,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ追加
        DB::table('users')->insert([
            'name' => 'test_general',
            'email' => 'test_general@gmail.com',
            'password' => Hash::make('test_general'),
            'introduction' => 'テスト用の一般ユーザーです。',
            'icon_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1724143344/nekocyanPAKE4498-429_TP_V4_czmziw.jpg',
            'administrator' => 0,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ追加
        DB::table('users')->insert([
            'name' => 'test_authorized',
            'email' => 'test_authorized@gmail.com',
            'password' => Hash::make('test_authorized'),
            'introduction' => '権限付与されたテスト用ユーザーです。',
            'icon_url' => 'https://res.cloudinary.com/dqgf3g25t/image/upload/v1724143344/nekocyanPAKE4498-429_TP_V4_czmziw.jpg',
            'administrator' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}