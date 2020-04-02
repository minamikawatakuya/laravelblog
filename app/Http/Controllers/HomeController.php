<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $cate_id = "";
        if( isset($request->id) ){
            $cate_id = $request->id;
        }
        
        $param = [
            'cate_id' => $cate_id
        ];
        return view('home.index', $param);
    }

    public function detail ( Request $request )
    {
        $blog_id = $request->id;

        $param = [
            'blog_id' => $blog_id
        ];

        return view('home.detail', $param);
    }

    public function edit ( Request $request )
    {
        $blog_id = $request->id;

        $param = [
            'blog_id' => $blog_id
        ];

        return view('home.edit', $param);
    }

    public function category ()
    {
        return view('home.category');
    }

    public function blog ()
    {
        return view('home.blog');
    }

}
