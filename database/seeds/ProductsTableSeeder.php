<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name' => 'ドーナツ',
                'shop_id' => 1,
                'category_id' => 15,
                'price' => 100,
                'image' => 'image/donut-gfae760e52_640.jpg',
                'expired_at' => now()->addDays(7),
            ],
            [
                'name' => 'シュークリーム',
                'shop_id' => 1,
                'category_id' => 15,
                'price' => 80,
                'image' => 'image/choux-g2f4989241_640.jpg',
                'expired_at' => now()->addDays(1),
            ],
            [
                'name' => 'カレー',
                'shop_id' => 2,
                'category_id' => 15,
                'price' => 80,
                'image' => 'image/curry-rice-gc5d4ab128_640.jpg',
                'expired_at' => now()->addDays(2),
            ],
            [
                'name' => 'サラダ',
                'shop_id' => 1,
                'category_id' => 8,
                'price' => 120,
                'image' => 'image/salad-g9a7c0354c_640.jpg',
                'expired_at' => now()->addDays(3),
            ],
            [
                'name' => '鮭おにぎり',
                'shop_id' => 1,
                'category_id' => 1,
                'price' => 70,
                'image' => 'image/rice-ball-g3f2afba5f_640.jpg',
                'expired_at' => now()->addDays(1),
            ],
            [
                'name' => 'ドーナツドーナッツ',
                'shop_id' => 1,
                'category_id' => 15,
                'price' => 100,
                'image' => 'image/donut-gfae760e52_640.jpg',
                'expired_at' => now()->addDays(2),
            ],
            [
                'name' => 'チョコシュークリーム',
                'shop_id' => 1,
                'category_id' => 15,
                'price' => 80,
                'image' => 'image/choux-g2f4989241_640.jpg',
                'expired_at' => now()->addDays(1),
            ],
            [
                'name' => 'インドカレー',
                'shop_id' => 2,
                'category_id' => 15,
                'price' => 80,
                'image' => 'image/curry-rice-gc5d4ab128_640.jpg',
                'expired_at' => now()->addDays(1),
            ],
            [
                'name' => 'シーザーサラダ',
                'shop_id' => 1,
                'category_id' => 8,
                'price' => 120,
                'image' => 'image/salad-g9a7c0354c_640.jpg',
                'expired_at' => now()->addDays(2),
            ],
            [
                'name' => '鮭おにぎり２個',
                'shop_id' => 1,
                'category_id' => 1,
                'price' => 70,
                'image' => 'image/rice-ball-g3f2afba5f_640.jpg',
                'expired_at' => now()->addDays(1),
            ],
            [
                'name' => 'プレーンドーナッツ',
                'shop_id' => 1,
                'category_id' => 15,
                'price' => 100,
                'image' => 'image/donut-gfae760e52_640.jpg',
                'expired_at' => now()->addDays(1),
            ],
            [
                'name' => 'シューアイス',
                'shop_id' => 1,
                'category_id' => 15,
                'price' => 80,
                'image' => 'image/choux-g2f4989241_640.jpg',
                'expired_at' => now()->addDays(2),
            ],
            [
                'name' => 'スパイスカレー',
                'shop_id' => 2,
                'category_id' => 15,
                'price' => 80,
                'image' => 'image/curry-rice-gc5d4ab128_640.jpg',
                'expired_at' => now()->addDays(2),
            ],
            [
                'name' => 'サラダチキン',
                'shop_id' => 1,
                'category_id' => 8,
                'price' => 120,
                'image' => 'image/salad-g9a7c0354c_640.jpg',
                'expired_at' => now()->addDays(2),
            ],
            [
                'name' => '和風ツナマヨ',
                'shop_id' => 1,
                'category_id' => 1,
                'price' => 70,
                'image' => 'image/rice-ball-g3f2afba5f_640.jpg',
                'expired_at' => now()->addDays(3),
            ],
        ]);

        // 全店舗(244店舗)の商品登録
        for($i = 1; $i < 245; $i++){
            DB::table('products')->insert([
                [
                    'name' => 'ざるうどん',
                    'shop_id' => $i,
                    'category_id' => 6,
                    'price' => 210,
                    'image' => 'image/3530397_s.jpg',
                    'expired_at' => now()->addDays(20),
                ],
                [
                    'name' => 'サラダ',
                    'shop_id' => $i,
                    'category_id' => 8,
                    'price' => 210,
                    'image' => 'image/24210496_s.jpg',
                    'expired_at' => now()->addDays(20),
                ],
                [
                    'name' => '春巻き',
                    'shop_id' => $i,
                    'category_id' => 13,
                    'price' => 70,
                    'image' => 'image/23504473_s.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'しおむすび',
                    'shop_id' => $i,
                    'category_id' => 1,
                    'price' => 70,
                    'image' => 'image/4806473_s.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'ざるそば',
                    'shop_id' => $i,
                    'category_id' => 6,
                    'price' => 180,
                    'image' => 'image/24154058_s.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'ハンバーグ弁当',
                    'shop_id' => $i,
                    'category_id' => 2,
                    'price' => 180,
                    'image' => 'image/23685784_s.jpg',
                    'expired_at' => now()->addDays(25),
                ],
                [
                    'name' => 'お弁当',
                    'shop_id' => $i,
                    'category_id' => 2,
                    'price' => 150,
                    'image' => 'image/24040930_s.jpg',
                    'expired_at' => now()->addDays(25),
                ],
                [
                    'name' => 'カツカレー（冷凍）',
                    'shop_id' => $i,
                    'category_id' => 23,
                    'price' => 200,
                    'image' => 'image/22942638_s.jpg',
                    'expired_at' => now()->addDays(25),
                ],

                [
                    'name' => 'ドーナツ',
                    'shop_id' => $i,
                    'category_id' => 5,
                    'price' => 100,
                    'image' => 'image/donut-gfae760e52_640.jpg',
                    'expired_at' => now()->addDays(7),
                ],
                [
                    'name' => 'シュークリーム',
                    'shop_id' => $i,
                    'category_id' => 15,
                    'price' => 80,
                    'image' => 'image/choux-g2f4989241_640.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'カレー',
                    'shop_id' => $i,
                    'category_id' => 2,
                    'price' => 180,
                    'image' => 'image/curry-rice-gc5d4ab128_640.jpg',
                    'expired_at' => now()->addDays(2),
                ],
                [
                    'name' => 'サラダ',
                    'shop_id' => $i,
                    'category_id' => 8,
                    'price' => 120,
                    'image' => 'image/salad-g9a7c0354c_640.jpg',
                    'expired_at' => now()->addDays(3),
                ],
                [
                    'name' => '鮭おにぎり',
                    'shop_id' => $i,
                    'category_id' => 1,
                    'price' => 70,
                    'image' => 'image/rice-ball-g3f2afba5f_640.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'ドーナツ',
                    'shop_id' => $i,
                    'category_id' => 5,
                    'price' => 100,
                    'image' => 'image/donut-gfae760e52_640.jpg',
                    'expired_at' => now()->addDays(30),
                ],
                [
                    'name' => 'チョコシュークリーム',
                    'shop_id' => $i,
                    'category_id' => 15,
                    'price' => 80,
                    'image' => 'image/choux-g2f4989241_640.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'インドカレー',
                    'shop_id' => $i,
                    'category_id' => 2,
                    'price' => 230,
                    'image' => 'image/curry-rice-gc5d4ab128_640.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'シーザーサラダ',
                    'shop_id' => $i,
                    'category_id' => 8,
                    'price' => 120,
                    'image' => 'image/salad-g9a7c0354c_640.jpg',
                    'expired_at' => now()->addDays(20),
                ],
                [
                    'name' => '鮭おにぎり２個',
                    'shop_id' => $i,
                    'category_id' => 1,
                    'price' => 70,
                    'image' => 'image/rice-ball-g3f2afba5f_640.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'プレーンドーナッツ',
                    'shop_id' => $i,
                    'category_id' => 15,
                    'price' => 100,
                    'image' => 'image/donut-gfae760e52_640.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'シューアイス',
                    'shop_id' => $i,
                    'category_id' => 15,
                    'price' => 80,
                    'image' => 'image/choux-g2f4989241_640.jpg',
                    'expired_at' => now()->addDays(2),
                ],
                [
                    'name' => 'スパイスカレー３個(冷凍)',
                    'shop_id' => $i,
                    'category_id' => 23,
                    'price' => 450,
                    'image' => 'image/curry-rice-gc5d4ab128_640.jpg',
                    'expired_at' => now()->addDays(30),
                ],
                [
                    'name' => 'サラダチキン３つ',
                    'shop_id' => $i,
                    'category_id' => 19,
                    'price' => 360,
                    'image' => 'image/salad-g9a7c0354c_640.jpg',
                    'expired_at' => now()->addDays(6),
                ],
                [
                    'name' => '和風ツナマヨ',
                    'shop_id' => $i,
                    'category_id' => 1,
                    'price' => 70,
                    'image' => 'image/rice-ball-g3f2afba5f_640.jpg',
                    'expired_at' => now()->addDays(3),
                ],


                // カテゴリーをランダムに
                [
                    'name' => 'ざるうどん',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 210,
                    'image' => 'image/3530397_s.jpg',
                    'expired_at' => now()->addDays(20),
                ],
                [
                    'name' => 'サラダ',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 210,
                    'image' => 'image/24210496_s.jpg',
                    'expired_at' => now()->addDays(20),
                ],
                [
                    'name' => '春巻き',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 70,
                    'image' => 'image/23504473_s.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'しおむすび',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 70,
                    'image' => 'image/4806473_s.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'ざるそば',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 180,
                    'image' => 'image/24154058_s.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'ハンバーグ弁当',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 180,
                    'image' => 'image/23685784_s.jpg',
                    'expired_at' => now()->addDays(25),
                ],
                [
                    'name' => 'お弁当',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 150,
                    'image' => 'image/24040930_s.jpg',
                    'expired_at' => now()->addDays(25),
                ],
                [
                    'name' => 'カツカレー（冷凍）',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 200,
                    'image' => 'image/22942638_s.jpg',
                    'expired_at' => now()->addDays(25),
                ],

                [
                    'name' => 'ドーナツ',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 100,
                    'image' => 'image/donut-gfae760e52_640.jpg',
                    'expired_at' => now()->addDays(7),
                ],
                [
                    'name' => 'シュークリーム',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 80,
                    'image' => 'image/choux-g2f4989241_640.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'カレー',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 180,
                    'image' => 'image/curry-rice-gc5d4ab128_640.jpg',
                    'expired_at' => now()->addDays(2),
                ],
                [
                    'name' => 'サラダ',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 120,
                    'image' => 'image/salad-g9a7c0354c_640.jpg',
                    'expired_at' => now()->addDays(3),
                ],
                [
                    'name' => '鮭おにぎり',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 70,
                    'image' => 'image/rice-ball-g3f2afba5f_640.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'ドーナツ',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 100,
                    'image' => 'image/donut-gfae760e52_640.jpg',
                    'expired_at' => now()->addDays(30),
                ],
                [
                    'name' => 'チョコシュークリーム',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 80,
                    'image' => 'image/choux-g2f4989241_640.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'インドカレー',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 230,
                    'image' => 'image/curry-rice-gc5d4ab128_640.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'シーザーサラダ',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 120,
                    'image' => 'image/salad-g9a7c0354c_640.jpg',
                    'expired_at' => now()->addDays(20),
                ],
                [
                    'name' => '鮭おにぎり２個',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 70,
                    'image' => 'image/rice-ball-g3f2afba5f_640.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'プレーンドーナッツ',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 100,
                    'image' => 'image/donut-gfae760e52_640.jpg',
                    'expired_at' => now()->addDays(1),
                ],
                [
                    'name' => 'シューアイス',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 80,
                    'image' => 'image/choux-g2f4989241_640.jpg',
                    'expired_at' => now()->addDays(2),
                ],
                [
                    'name' => 'スパイスカレー３個(冷凍)',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 450,
                    'image' => 'image/curry-rice-gc5d4ab128_640.jpg',
                    'expired_at' => now()->addDays(30),
                ],
                [
                    'name' => 'サラダチキン３つ',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 360,
                    'image' => 'image/salad-g9a7c0354c_640.jpg',
                    'expired_at' => now()->addDays(6),
                ],
                [
                    'name' => '和風ツナマヨ',
                    'shop_id' => $i,
                    'category_id' => mt_rand(1, 25),
                    'price' => 70,
                    'image' => 'image/rice-ball-g3f2afba5f_640.jpg',
                    'expired_at' => now()->addDays(3),
                ],
            ]);
        }
    }
}
