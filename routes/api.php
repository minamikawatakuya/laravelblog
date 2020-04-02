<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/blogs',   'Api\IndexController@blogs');
Route::get('/blogs/{id}',   'Api\IndexController@blogs')->where('id', '[0-9]+');
Route::get('/categories',   'Api\IndexController@categories');
Route::get('/detail/{id}',   'Api\IndexController@detail')->where('id', '[0-9]+');
Route::get('/blogAllNum',   'Api\IndexController@blogAllNum');
Route::get('/blogNoCateNum',   'Api\IndexController@blogNoCateNum');
Route::get('/category/{id}',   'Api\IndexController@category')->where('id', '[0-9]+');

Route::post('/deleteBlog',   'Api\IndexController@deleteBlog');
Route::post('/updateBlog',   'Api\IndexController@updateBlog');
Route::post('/updateCategory',   'Api\IndexController@updateCategory');
Route::post('/addCategory',   'Api\IndexController@addCategory');
Route::post('/addBlog',   'Api\IndexController@addBlog');
Route::post('/deleteCategory',   'Api\IndexController@deleteCategory');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
