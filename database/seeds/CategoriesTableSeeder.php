<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'カテゴリー1',
            'order_num' => '1'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'カテゴリー2',
            'order_num' => '2'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'カテゴリー3',
            'order_num' => '3'
        ];
        DB::table('categories')->insert($param);

    }
}
