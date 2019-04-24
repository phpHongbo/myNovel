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
	Route::get('/ciwei', 'Admin\IndexController@index');
	//后台欢迎页
	Route::get('/ciwei/welcome','Admin\IndexController@welcome');
	//后台分类删除
	Route::get('/ciwei/typedel/','Admin\TypeController@del');
	//后台分类批量删除
	Route::get('/ciwei/typedelall/','Admin\TypeController@delall');
	//后台分类隐藏
	Route::get('/ciwei/stop','Admin\TypeController@stop');
	//后台分类资源控制器
	Route::resource('/ciwei/type','Admin\TypeController');
	//后台轮播图类别
	Route::get('/ciwei/lunbotype','Admin\CarouselController@type');
	//后台轮播图状态
	Route::get('/ciwei/lunbostatus','Admin\CarouselController@status');
	//后台轮播图删除
	Route::get('/ciwei/lunbodel','Admin\CarouselController@del');
	//后台轮播图批量删除
	Route::get('/ciwei/lunbodelall','Admin\CarouselController@delall');
	//后台轮播图资源控制器
	Route::resource('/ciwei/lunbo','Admin\CarouselController');
	//后台宅文推荐管理
	Route::get('/ciwei/zwen','Admin\ResidenceController@index');
	//后台宅文推荐之点击率
	Route::get('/ciwei/click','Admin\ResidenceController@click');
	//后台宅文推荐之添加数据
	Route::get('/ciwei/addlick','Admin\ResidenceController@addclick');
	//后台宅文推荐之推荐率
	Route::get('/ciwei/tuijian','Admin\ResidenceController@tuijian');
	//后台宅文推荐之状态
	Route::get('/ciwei/status','Admin\ResidenceController@status');
	//后台宅文推荐之删除
	Route::get('/ciwei/tuijiandel','Admin\ResidenceController@del');
	//后台Boss推荐资源控制器
	Route::resource('/ciwei/boss','Admin\BossController');
	//后台Boss检测小说是否存在
	Route::get('/ciwei/check','Admin\BossController@check');
	//后台Boss推荐之显示/隐藏
	Route::get('/ciwei/stores','Admin\BossController@stores');
	//后台Boss推荐之删除
	Route::get('/ciwei/bossdel','Admin\BossController@del');
	//后台作品管理之作品列表
	Route::get('/ciwei/opus','Admin\OpusController@index');
	//后台作品管理之审核列表
	Route::get('/ciwei/examine/{id}','Admin\OpusController@examine');
	//后台作品管理之审核页面
	Route::get('/ciwei/shenhe/{id}','Admin\OpusController@chapter_list');
	//后台作品管理之作品审核
	Route::get('/ciwei/pass','Admin\OpusController@chapter_check');
	//后台作品管理之敏感词资源控制器
	Route::resource('/ciwei/senwords','Admin\WordsController');
	//后台作品管理之敏感词删除
	Route::get('/ciwei/wordsdel','Admin\WordsController@del');
	
	
	

});

//前台路由组
Route::group([],function(){
	//前台首页
	Route::get('/', 'Home\IndexController@index');
});