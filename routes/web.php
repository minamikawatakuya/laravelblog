<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');
Route::get('/{id}', 'IndexController@index')->where('id', '[0-9]+');
Route::get('/detail/{id}', 'IndexController@detail')->where('id', '[0-9]+');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{id}', 'HomeController@index')->where('id', '[0-9]+');
Route::get('/home/detail/{id}', 'HomeController@detail')->where('id', '[0-9]+');
Route::get('/home/edit/{id}', 'HomeController@edit')->where('id', '[0-9]+');
Route::get('/home/category', 'HomeController@category');
Route::get('/home/blog', 'HomeController@blog');
