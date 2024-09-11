<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //初期データ
        DB::table('works')->insert([
            'name' => '神様の御用人',
            'introduction' => '神様の御用を達成するために奔走する御用人と神様との絆を描いた小説',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
         //初期データ2
        DB::table('works')->insert([
            'name' => 'ゴールデンカムイ',
            'introduction' => '日露戦争後の北海道・樺太を舞台に、兵士・囚人・アイヌが金塊をめぐって争うバトル漫画',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}