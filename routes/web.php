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

//后台路由组
Route::group([],function(){
	//后台首页
	Route::get('/ciwei', "Admin\IndexController@index");
	//后台欢迎页
	Route::get('/ciwei/welcome',"Admin\IndexController@welcome");
});

//前台路由组
Route::group([],function(){
	//前台首页
	Route::get('/', "Home\IndexController@index");
});