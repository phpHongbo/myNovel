<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use Hash;
use DB;

class LoginController extends Controller
{
	/**
	 * 后台登录页
	 * @return [type] [description]
	 */
    public function login()
    {
    	// dd(Hash::make('123456'));
    	return view('admin.login.login',['title'=>'管理员登录']);
    }

    /**
     * 处理登录方法
     * @return [type] [description]
     */
    public function dologin(Request $request)
    {
    	//获取id
    	$name = $request->input('name');
    	//验证码检测
		if ($request->captcha != Session::get('fcode')){

			return redirect('/ciwei/login')->with('error','验证码错误');
		}
		//根据id查询用户
		$res = Admin::where("name","{$name}")->where("status","0")->first();
		//用户名判断
		if($res){
			if(Hash::check($request->password,$res->password)){
				
                $nodelist = [];
                //权限初始化;
                $nodelist[] = 'App\Http\Controllers\Admin\IndexController@index';
                $nodelist[] = 'App\Http\Controllers\Admin\IndexController@welcome';
                $nodelist[] = 'App\Http\Controllers\Admin\AdminController@showpass';
                $nodelist[] = 'App\Http\Controllers\Admin\AdminController@dopass';
                $nodelist[] = 'App\Http\Controllers\Admin\AdminController@myselfinfo';
                //根据用户id获取用户角色
                //遍历角色获取对应的权限
                foreach($res->getrole as $v){
                    foreach($v->getnode as $val){
                        $nodelist[] = $val->aname;
                        // dump(strtok($val->aname,'@'));
                        $str = trim(strrchr($val->aname, '@'),'/');
                        // dump($str);
                        if($str == '@index'){
                            // dump($str);
                            $nodelist[] = str_replace('index','show',$val->aname);
                            continue;
                        }
                        if($str == '@create'){
                            // dump($str);
                            $nodelist[] = str_replace('create','store',$val->aname);
                            continue;
                        }
                        if($str == '@edit'){
                            // dump($str);
                            $nodelist[] = str_replace('edit','update',$val->aname);
                            continue;
                        }
                        if($str == '@password'){
                            // dump($str);
                            $nodelist[] = str_replace('password','dopassword',$val->aname);
                        }
                    }
                }
                // dd($nodelist);
                $role = [];
                //往session里面存储信息
                foreach($res->getrole as $val){
                    $role[] = $val->rolename;
                }
                session(['role'=>$role]);
                session(['admin'=>$res->name]);
                session(['id'=>$res->id]);
                session(['nodelist'=>$nodelist]);
				//跳转
				return redirect('/ciwei')->with('success','登录成功');
			}else{
				return redirect('/ciwei/login')->with('error','密码错误');
			}
		} else {
			return redirect('/ciwei/login')->with('error','管理员不存在');
		}
    }

    /**
     * 管理员退出
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        //清空session
        session(['admin'=>'']);

        //跳转
        return redirect('/ciwei/login');
    }

 	/**
     * 显示验证码
     *
     * @return Response
     */
    public function captcha()
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 120, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        Session::put('fcode', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    } 
}
