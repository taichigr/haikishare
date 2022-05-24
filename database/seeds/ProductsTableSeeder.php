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
    }
}
