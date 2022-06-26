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

    private $prefectures = [
        '北海道' => '札幌市',
        '青森県' => '青森市',
        '岩手県' => '盛岡市',
        '宮城県' => '仙台市',
        '秋田県' => '秋田市',
        '山形県' => '山形市',
        '福島県' => '福島市',
        '茨城県' => '水戸市',
        '栃木県' => '宇都宮市',
        '群馬県' => '群馬市',
        '埼玉県' => 'さいたま市',
        '千葉県' => '千葉市',
        '東京都' => '新宿区',
        '神奈川県' => '横浜市',
        '新潟県' => '新潟市',
        '富山県' => '富山市',
        '石川県' => '金沢市',
        '福井県' => '福石',
        '山梨県' => '甲府市',
        '長野県' => '長野市',
        '岐阜県' => '岐阜市',
        '静岡県' => '静岡市',
        '愛知県' => '名古屋市',
        '三重県' => '津市',
        '滋賀県' => '大津市',
        '京都府' => '京都市',
        '大阪府' => '大阪市',
        '兵庫県' => '神戸市',
        '奈良県' => '奈良市',
        '和歌山県' => '和歌山市',
        '鳥取県' => '鳥取市',
        '島根県' => '松江市',
        '岡山県' => '岡山市',
        '広島県' => '広島市',
        '山口県' => '山口市',
        '徳島県' => '徳島市',
        '香川県' => '高松市',
        '愛媛県' => '松山市',
        '高知県' => '高知市',
        '福岡県' => '福岡市',
        '佐賀県' => '佐賀市',
        '長崎県' => '長崎市',
        '熊本県' => '熊本市',
        '大分県' => '大分市',
        '宮崎県' => '宮崎市',
        '鹿児島県' => '鹿児島市',
        '沖縄県' => '那覇市'
    ];
    public function run()
    {
        //
        DB::table('shops')->insert([
            [
                'name'              => 'shop1',
                'branch_name'       => '支店名１',
                'email'             => 'shop1@example.com',
                'prefecture_id'     => 27,
                'address'           => '大阪市中央区上本町',
                'password'          => Hash::make('passpass'),
            ],
            [
                'name'              => 'shop2',
                'branch_name'       => '支店名2',
                'email'             => 'shop12@example.com',
                'prefecture_id'     => 27,
                'address'           => '大阪市天王寺区上本町',
                'password'          => Hash::make('passpass'),
            ],
            [
                'name'              => 'shop3',
                'branch_name'       => '支店名3',
                'email'             => 'shop3@example.com',
                'prefecture_id'     => 13,
                'address'           => '新宿区西新宿',
                'password'          => Hash::make('passpass'),
            ],
            [
                'name'              => 'shop4',
                'branch_name'       => '支店名4',
                'email'             => 'shop4@example.com',
                'prefecture_id'     => 27,
                'address'           => '大阪市北区',
                'password'          => Hash::make('passpass'),
            ],
            [
                'name'              => 'shop5',
                'branch_name'       => '支店名5',
                'prefecture_id'     => 27,
                'email'             => 'shop5@example.com',
                'address'           => '豊中市',
                'password'          => Hash::make('passpass'),
            ],
        ]);

        DB::table('shops')->insert([
            [
                'name'              => 'コンビニ000',
                'branch_name'       => '渋谷駅前店',
                'email'             => 'shibuya@example.com',
                'prefecture_id'     => 13,
                'address'           => '渋谷区',
                'password'          => Hash::make('passpass'),
            ],
            [
                'name'              => 'コンビニ001',
                'branch_name'       => '中野店',
                'email'             => 'nakano@example.com',
                'prefecture_id'     => 13,
                'address'           => '中野区',
                'password'          => Hash::make('passpass'),
            ],
            [
                'name'              => 'コンビニ002',
                'branch_name'       => '東新宿店',
                'email'             => 'shinjukuhigashi@example.com',
                'prefecture_id'     => 13,
                'address'           => '新宿区東新宿',
                'password'          => Hash::make('passpass'),
            ],
            [
                'name'              => 'コンビニ004',
                'branch_name'       => '丸の内',
                'email'             => 'marunouchi@example.com',
                'prefecture_id'     => 13,
                'address'           => '千代田区',
                'password'          => Hash::make('passpass'),
            ],
        ]);
        $i = 0;
        foreach($this->prefectures as $pref => $city) {
            $i++;
            DB::table('shops')->insert([
                [
                    'name'              => 'コンビニ'.$pref.'1',
                    'branch_name'       => '支店'.$pref.'1',
                    'email'             => 'shop'.mt_rand().'@example.com',
                    'prefecture_id'     => $i,
                    'address'           => $city,
                    'password'          => Hash::make('passpass'),
                ],
                [
                    'name'              => 'コンビニ'.$pref.'2',
                    'branch_name'       => '支店'.$pref.'2',
                    'email'             => 'shop'.mt_rand().'@example.com',
                    'prefecture_id'     => $i,
                    'address'           => $city,
                    'password'          => Hash::make('passpass'),
                ],
                [
                    'name'              => 'コンビニ'.$pref.'3',
                    'branch_name'       => '支店'.$pref.'3',
                    'email'             => 'shop'.mt_rand().'@example.com',
                    'prefecture_id'     => $i,
                    'address'           => $city,
                    'password'          => Hash::make('passpass'),
                ],
                [
                    'name'              => 'コンビニ'.$pref.'4',
                    'branch_name'       => '支店'.$pref.'4',
                    'email'             => 'shop'.mt_rand().'@example.com',
                    'prefecture_id'     => $i,
                    'address'           => $city,
                    'password'          => Hash::make('passpass'),
                ],
                [
                    'name'              => 'コンビニ'.$pref.'5',
                    'branch_name'       => '支店'.$pref.'5',
                    'prefecture_id'     => $i,
                    'email'             => 'shop'.mt_rand().'@example.com',
                    'address'           => $city,
                    'password'          => Hash::make('passpass'),
                ],
            ]);
        }
    }
}
