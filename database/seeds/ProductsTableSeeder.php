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
                'name' => 'プリン',
                'shop_id' => 1,
                'category_id' => 15,
                'price' => 100,
                'image' => 'image',
            ],
            [
                'name' => 'シュークリーム',
                'shop_id' => 1,
                'category_id' => 15,
                'price' => 80,
                'image' => 'image',
            ],
            [
                'name' => 'エクレア',
                'shop_id' => 2,
                'category_id' => 15,
                'price' => 80,
                'image' => 'image',
            ],
            [
                'name' => 'サラダ',
                'shop_id' => 1,
                'category_id' => 8,
                'price' => 120,
                'image' => 'image',
            ],
            [
                'name' => '鮭おにぎり',
                'shop_id' => 1,
                'category_id' => 1,
                'price' => 70,
                'image' => 'image',
            ],
        ]);
    }
}
