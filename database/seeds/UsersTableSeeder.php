<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'hoge',
            'email' => 'hoge@gmail.com',
            'password' => Hash::make('hogepass'),
            'remember_token' => str_random(10),
        ];
        DB::table('users')->insert($param);
    }
}
