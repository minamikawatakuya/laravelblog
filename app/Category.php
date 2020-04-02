<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Blog;

class Category extends Model
{
    protected $appends = ['blog_num'];
    
    public function blogs(){
        return $this->hasMany('App\Blog');
    }

    public function getBlogNumAttribute()
    {
        return $this->blogs()->count();
    }
    
    public function getAll(){
        $data = $this->orderBy('order_num', 'asc')->get();
        return $data;
    }

    public function getById( $id ){
        return $this->find( $id );
    }

    public function getNameById( $id ){
        return $this->find( $id )->name;
    }

    public function updateCategory( $request ){
        $data = $this->find( $request->id );
        $data->name = $request->name;
        $data->order_num = $request->order_num;
        $data->save();
        return true;
    }

    public function addCategory( $request ){
        $this->name = $request->name;
        $this->order_num = $request->order_num;
        $this->save();
        return true;
    }

    public function deleteCategory( $cate_id ){

        $blog = new Blog();

        DB::beginTransaction();
        
        try {

            // ブログのカテゴリーを未選択(ID:1)に変更
            $blog->updateCateIdWhenCateDelete($cate_id);

            // カテゴリーの削除処理
            $category = $this->find( $cate_id );
            $category->delete();

            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();
            return false;

        }

        return true;
    }

}
