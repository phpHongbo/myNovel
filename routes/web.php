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

//管理员退出
Route::get('/ciwei/logout','Admin\LoginController@logout');
Route::get('/ciwei/roleper',function(){
	return view('admin.roleper');
});
//后台路由组
Route::group(['middleware' => ['admin']],function(){
	//后台首页
	Route::get('/ciwei', 'Admin\IndexController@index');
	//后台欢迎页
	Route::get('/ciwei/welcome','Admin\IndexController@welcome');
	//修改管理员状态
	Route::get('/ciwei/admin/status','Admin\AdminController@status');
	//修改管理员密码
	Route::get('/ciwei/admin/password/{id}','Admin\AdminController@password');
	Route::post('/ciwei/admin/dopassword','Admin\AdminController@dopassword');
	//展示修改个人密码页
	Route::get('/ciwei/admin/showpass','Admin\AdminController@showpass');
	//查看管理员个人信息
	Route::get('/ciwei/admin/myselfinfo','Admin\AdminController@myselfinfo');
	//修改个人密码
	Route::post('/ciwei/admin/dopass','Admin\AdminController@dopass');
	//后台管理员
	Route::resource('/ciwei/admin','Admin\AdminController');
	//修改用户状态
	Route::get('/ciwei/users/status','Admin\UsersController@status');
	//后台用户管理
	Route::resource('/ciwei/users','Admin\UsersController');
	//角色管理
	Route::resource('/ciwei/role','Admin\RoleController');
	//权限管理
	Route::resource('/ciwei/node','Admin\NodeController');
	//--宏波--//
	//后台分类删除
	Route::get('/ciwei/typedel','Admin\TypeController@del');
	//后台分类批量删除
	Route::get('/ciwei/typedelall','Admin\TypeController@delall');
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

//前台登录页
Route::get('/login','Home\LoginController@login');
Route::post('/dologin','Home\LoginController@dologin');
Route::get('/captcha','Home\LoginController@captcha');
//前台注册
Route::get('/register','Home\LoginController@register');
Route::post('/doregister','Home\LoginController@doregister');

//获取邮箱验证码
Route::get('/getemail','Home\LoginController@getemail');
//获取手机验证码
Route::get('/getphone','Home\LoginController@getphone');
Route::get('/findemail','Home\LoginController@findemail');
Route::get('/findphone','Home\LoginController@findphone');
//忘记密码
Route::get('/forget','Home\LoginController@forget');
Route::post('/doforget','Home\LoginController@doforget');

//后台登录页
Route::get('/ciwei/login','Admin\LoginController@login');
Route::post('/ciwei/dologin','Admin\LoginController@dologin');
Route::get('/ciwei/captcha','Admin\LoginController@captcha');



