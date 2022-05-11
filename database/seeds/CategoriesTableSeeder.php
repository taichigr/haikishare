<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    private $categories = [
        'おにぎり',
        'お弁当',
        'お寿司',
        'サンドイッチ・ロールパン',
        'パン',
        'そば・うどん・中華めん',
        'パスタ',
        'サラダ',
        'チルド惣菜',
        'スープ・グラタン・ドリア',
        'お好み焼き・たこ焼き',
        '日配品 加工肉 たまご カット野菜 漬物など',
        'ホットスナック・惣菜',
        '中華まん',
        'デザート',
        '和菓子',
        '焼き菓子',
        'コーヒー・フラッペ',
        '加工食品',
        'お菓子',
        '飲料',
        'お酒',
        '冷凍食品',
        'アイス',
        '日用品',
        '雑誌・書籍',
        'スキンケア・コスメ',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach ($this->categories as $category) {
            DB::table('categories')->insert([
                "name" => $category
            ]);
        }
    }
}
