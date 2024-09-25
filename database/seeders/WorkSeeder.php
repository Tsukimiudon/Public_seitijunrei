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
        //初期データ3
        DB::table('works')->insert([
            'name' => '千と千尋の神隠し',
            'introduction' => '異世界に迷い込んだ主人公がその世界で生き抜いていくファンタジー映画',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ4
        DB::table('works')->insert([
            'name' => 'ゲゲゲの鬼太郎',
            'introduction' => '水木しげるによる漫画。妖怪についての知識を一般に広げた',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ5
        DB::table('works')->insert([
            'name' => '名探偵コナン',
            'introduction' => '幼児化させられた高校生探偵・工藤新一が江戸川コナンと名乗り、数々の事件を解決していく推理漫画',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ6
        DB::table('works')->insert([
            'name' => '君の名は。',
            'introduction' => '二人の高校生の間で起きた入れ替わりとティアマト彗星を題材にした映画',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ7
        DB::table('works')->insert([
            'name' => '呪術廻戦',
            'introduction' => '人間の負の感情から生まれた呪霊を祓う呪術師の戦いを描いたバトル漫画',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ8
        DB::table('works')->insert([
            'name' => '鬼滅の刃',
            'introduction' => '主人公が鬼になってしまった妹を元に戻すため奮闘するバトル漫画',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ9
        DB::table('works')->insert([
            'name' => 'ゆるキャン△',
            'introduction' => '山梨県周辺を舞台に、キャンプやアウトドアを楽しむ女子高校生の日常を描いた漫画',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        //初期データ10
        DB::table('works')->insert([
            'name' => '【推しの子】',
            'introduction' => '推しのアイドルの子どもに生まれ変わった双子が芸能界を生き抜いていく',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}