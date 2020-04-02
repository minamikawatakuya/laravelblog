<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index ( Request $request )
    {

        $cate_id = "";
        if( isset($request->id) ){
            $cate_id = $request->id;
        }
        
        $param = [
            'cate_id' => $cate_id
        ];
        return view('index', $param);
    }

    public function detail ( Request $request )
    {
        $blog_id = $request->id;

        $param = [
            'blog_id' => $blog_id
        ];

        return view('detail', $param);
    }
}
