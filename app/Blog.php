<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;

class Blog extends Model
{
    //protected $appends = ['cate_id','cate_name','content_short'];
    protected $appends = [ 'content_short', 'cate_name' ];
    private $db_category = NULL;

    public function __construct()
    {
        $this->db_category = new Category();
    }
    
    /*
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function getCateIdAttribute()
    {
        return $this->category->id;
    }

    public function getCateNameAttribute()
    {
        return $this->category->name;
    }
    */

    public function getCateNameAttribute()
    {
        if( $this->category_id == NULL ){
            $category_name = "未選択";
        }else{
            $category_name = $this->db_category->getNameById( $this->category_id );
        }
        return $category_name;
    }

    public function getContentShortAttribute()
    {
        return mb_strimwidth( $this->content, 0, 100, "...", "UTF-8" );
    }
    
    public function getAll(){
        $datas = $this->orderBy('id', 'desc')->paginate(30);
        return $datas;
    }

    public function getByCateId( $cate_id ){
        if( $cate_id == "0" ){
            $cate_id = NULL;
        }
        $data = $this->where('category_id',$cate_id)
            ->orderBy('id', 'desc')
            ->paginate(30);
        
        return $data;
    }

    public function getById( $id ){
        $data = $this->where('id',$id)->first();
        return $data;
    }

    public function getAllNum(){
        return $this->all()->count();
    }

    public function getNoCateNum(){
        return $this->where('category_id',NULL)->get()->count();
    }

    public function deleteById($id){
        $data = $this->find($id);
        $data->delete();
        return true;
    }

    public function updateBlog( $request ){
        $blog = $this->find( $request->id );
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->category_id = $request->cate_id;
        $blog->save();
        return true;
    }

    public function addBlog( $request ){
        $this->user_id = "1";
        $this->title = $request->title;
        $this->content = $request->content;
        $this->category_id = $request->cate_id;
        $this->save();
        return true;
    }

    public function updateCateIdWhenCateDelete( $cate_id ){
        $this->where( 'category_id', $cate_id )->update(['category_id' => NULL]);
        return true;
    }

}
