<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Blog',50)->create();
        
        /*
        for( $i=1; $i<=20; $i++ ){
            $title = sprintf('サンプルブログ%s',$i);
            $content = sprintf(
                'サンプルブログの内容%sサンプルブログの内容%sサンプルブログの内容%sサンプルブログの内容%s',
                $i,$i,$i,$i
            );
            $param = [
                'user_id' => '1',
                'category_id' => '1',
                'title' => $title,
                'content' => $content,
            ];
            DB::table('blogs')->insert($param);
        }
        for( $i=21; $i<=40; $i++ ){
            $title = sprintf('サンプルブログ%s',$i);
            $content = sprintf(
                'サンプルブログの内容%sサンプルブログの内容%sサンプルブログの内容%sサンプルブログの内容%s',
                $i,$i,$i,$i
            );
            $param = [
                'user_id' => '1',
                'category_id' => '2',
                'title' => $title,
                'content' => $content,
            ];
            DB::table('blogs')->insert($param);
        }
        for( $i=41; $i<=60; $i++ ){
            $title = sprintf('サンプルブログ%s',$i);
            $content = sprintf(
                'サンプルブログの内容%sサンプルブログの内容%sサンプルブログの内容%sサンプルブログの内容%s',
                $i,$i,$i,$i
            );
            $param = [
                'user_id' => '1',
                'category_id' => '3',
                'title' => $title,
                'content' => $content,
            ];
            DB::table('blogs')->insert($param);
        }
        */
    }
}
