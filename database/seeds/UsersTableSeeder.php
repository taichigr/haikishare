<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name'              => 'user1',
                'email'             => 'user1@example.com',
                'password'          => Hash::make('passpass'),
            ],
            [
                'name'              => 'user2',
                'email'             => 'user2@example.com',
                'password'          => Hash::make('passpass'),
            ],
            [
                'name'              => 'user3',
                'email'             => 'user3@example.com',
                'password'          => Hash::make('passpass'),
            ],
            [
                'name'              => 'user4',
                'email'             => 'user4@example.com',
                'password'          => Hash::make('passpass'),
            ],
            [
                'name'              => 'user5',
                'email'             => 'user5@example.com',
                'password'          => Hash::make('passpass'),
            ],
        ]);
    }
}
