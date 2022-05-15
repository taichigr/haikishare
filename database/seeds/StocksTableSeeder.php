<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('stocks')->insert([
            [
                'product_id' => 1,
                // 'type' => '1',
                'quantity' => 5,
            ],
            [
                'product_id' => 1,
                // 'type' => '1',
                'quantity' => 3,
            ],
            [
                'product_id' => 1,
                // 'type' => '1',
                'quantity' => -2,
            ],
        ]);
    }
}
