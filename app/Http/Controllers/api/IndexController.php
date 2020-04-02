<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Blog;
use App\Category;

class IndexController extends Controller
{

    public function blogs( Request $request, Blog $blog ){
        if( isset($request->id) ){
            $blogs = $blog->getByCateId($request->id);
        }else{
            $blogs = $blog->getAll();
        }
        return $blogs;
    }

    public function categories( Request $request, Category $category ){
        $categories = $category->getAll();
        return $categories;
    }

    public function detail( Request $request, Blog $blog ){
        $blog_id = $request->id;
        $blog = $blog->getById( $blog_id );
        return $blog;
    }

    public function blogAllNum(Blog $blog){
        return $blog->getAllNum();
    }

    public function blogNoCateNum(Blog $blog){
        return $blog->getNoCateNum();
    }

    public function deleteBlog( Request $request, Blog $blog ){
        $blog_id = $request->id;
        $result = $blog->deleteById( $blog_id );
        if( $result === true ){
            $return_data = "{result:ok}";
            return $return_data;
        }else{
            return false;
        }
    }

    public function updateBlog( Request $request, Blog $blog ){
        $result = $blog->updateBlog( $request );
        if( $result === true ){
            $return_data = "{result:ok}";
            return $return_data;
        }else{
            return false;
        }
    }

    public function category( Request $request, Category $category ){
        $data = $category->getById( $request->id );
        return $data;
    }

    public function updateCategory( Request $request, Category $category ){
        $result = $category->updateCategory( $request );
        if( $result === true ){
            $return_data = "{result:ok}";
            return $return_data;
        }else{
            return false;
        }
    }

    public function addCategory( Request $request, Category $category ){
        $result = $category->addCategory( $request );
        if( $result === true ){
            $return_data = "{result:ok}";
            return $return_data;
        }else{
            return false;
        }
    }

    public function addBlog( Request $request, Blog $blog ){
        $result = $blog->addBlog( $request );
        if( $result === true ){
            $return_data = "{result:ok}";
            return $return_data;
        }else{
            return false;
        }
    }

    public function deleteCategory( Request $request, Category $category ){
        $result = $category->deleteCategory( $request->id );
        if( $result === true ){
            $return_data = "{result:ok}";
            return $return_data;
        }else{
            return false;
        }
    }

}
