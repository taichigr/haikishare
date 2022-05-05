<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('shops')->insert([
            [
                'name'              => 'shop1',
                'branch_name'       => '支店名１',
                'email'             => 'shop1@example.com',
                'address'           => '大阪市中央区上本町',
                'password'          => Hash::make('passpass'),
            ],
            [
                'name'              => 'shop2',
                'branch_name'       => '支店名2',
                'email'             => 'shop12@example.com',
                'address'           => '大阪市天王寺区上本町',
                'password'          => Hash::make('passpass'),
            ],
            [
                'name'              => 'shop3',
                'branch_name'       => '支店名3',
                'email'             => 'shop3@example.com',
                'address'           => '東京都新宿区西新宿',
                'password'          => Hash::make('passpass'),
            ],
            [
                'name'              => 'shop4',
                'branch_name'       => '支店名4',
                'email'             => 'shop4@example.com',
                'address'           => '大阪府大阪市北区',
                'password'          => Hash::make('passpass'),
            ],
            [
                'name'              => 'shop5',
                'branch_name'       => '支店名5',
                'email'             => 'shop5@example.com',
                'address'           => '大阪府豊中市',
                'password'          => Hash::make('passpass'),
            ],
        ]);
    }
}
