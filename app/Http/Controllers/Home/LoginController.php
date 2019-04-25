<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use App\Model\Admin\Users;
use Session;
use Cookie;
use Hash;
use DB;
use Mail;
use Ucpaas;

class LoginController extends Controller
{
	/**
	 * 登录注册页
	 * @return [type] [description]
	 */
    public function login()
    {
    	return view('home.login.login',['title'=>'登录页面']);
    }

    /**
     * 用户注册页
     * @return [type] [description]
     */
    public function register()
    {
    	return view('home.login.register',['title'=>'注册页面']);
    }

    /**
     * 处理注册
     * @return [type] [description]
     */
    public function doregister(Request $request)
    {
        //判断是手机注册还是邮箱注册
        $type = $request->input('type');
        // dump($request->all());exit;
        $data = array();
        //加密
        $data['password'] = Hash::make($request->password);
        if($type == 'email'){
            $data['email'] = $request->username;
        } 
        if($type == 'mobile'){
            $data['phone'] = $request->username;
        }   
        //补全字段
       // echo uniqid();exit;
        $data['username'] = '书客'.uniqid(); 
        $data['nickname'] = $data['username']; 
        $data['addtime'] = time();
        // dump($data);exit;
        //判断验证码是否正确
        if($request->rand == Session::get('rand')){
            //执行插入
            //echo 1;
            //DB::table('users')->insert($data);
            //echo $bool;
            $row['age'] = 1;
            $user = Users::create($data);
            $userinfo = Users::find($user->id);
            if($userinfo->usersInfo()->create($row)){
                echo 1;
            } else {
                echo '注册失败';
            }
        } else {
            echo '验证码错误';
        }
    }
    /**
     * 处理登录方法
     * @return [type] [description]
     */
    public function dologin(Request $request)
    {
    	//获取数据
    	$username = $request->username;
    	$autoLogin = $request->autoLogin;
    	// echo $username;exit;
		if($request->captcha != Session::get('captcha')){

			return back()->withInput()->with('error','验证码错误');
		}
		// dd($request->all());
    	$res = DB::select('select * from users where phone = :phone or email = :email', ['phone' => $username,'email'=> $username]);
		//根据用户名进行判断
    	if($res){
    		//密码的检测
	    	if (Hash::check($request->password, $res[0]->password)) {
	    		//往session里面存储信息
				// Session::put()
				// echo '登录成功';exit;
				if($autoLogin){
					//存到cookie中
					Cookie::queue('username',$res[0]->username);
					return redirect('/');
				}
				session(['username'=>$res[0]->username]);
				session(['uid'=>$res[0]->id]);
				//跳转
				return redirect('/');
			}else{

			   	return back()->withInput()->with('error','密码错误');
			}
    	}else{

			return back()->withInput()->with('error','用户不存在');
    	}
    }

    /**
     * 找回密码页面
     * @return [type] [description]
     */
    public function forget()
    {
        return view('home.login.forget',['title'=>'忘记密码']);
    }

    /**
     * 处理修改密码方法
     * @return [type] [description]
     */
    public function doforget(Request $request)
    {
        //密码加密
        $data['password'] = Hash::make($request->password);
        if($request->rand == Session::get('rand')){
            //执行修改
            //echo $bool;
            if($request->has('phone')){
                $data['phone'] = $request->phone;
                if(DB::update('UPDATE users SET password = :password WHERE phone = :phone',$data)){
                    echo 1;
                } else {
                    echo '修改失败';
                }
            }else{
                $data['email'] = $request->email;
                if(DB::update('UPDATE users SET password = :password WHERE email = :email',$data)){
                    echo 1;
                } else {
                    echo '修改失败';
                }
            }
            
        } else {
            echo '验证码错误';
        }
    }
    
    /**
     * 查询邮箱是否存在
     * @return [type] [description]
     */
    public function findemail(Request $request)
    {
        if(DB::table('users')->where('email',$request->email)->first()){
            echo 1;
        }else{
            echo 0;
        }
    }

    /**
     * 查询手机号是否存在
     * @return [type] [description]
     */
    public function findphone(Request $request)
    {
        if(DB::table('users')->where('phone',$request->phone)->first()){
            echo 1;
        }else{
            echo 0;
        }
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
        Session::put('captcha', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

    /**
     * 获取邮箱验证码方法
     * @return [type] [description]
     */
    public function getemail(Request $request)
    {   
        //获取四位数随机数
        $rand = mt_rand('1111','9999');
        //存到session中
        session(['rand'=>$rand]);
        // 发封邮件  激活账号使用
        Mail::send("home.emails.reminder",['rand'=>$rand,'title'=>'刺猬猫阅读验证码'], function ($m) use ($request){

            $m->from(env('MAIL_USERNAME'), '刺猬猫阅读');

            $m->to($request->email)->subject('刺猬猫验证码');
        });

        echo 1;
    }
    /**
     * 获取手机验证码
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getphone(Request $request)
    {
        //获取随机数
        $rand = mt_rand(1111,9999);
        //获取手机号码
        $phone = $request->input('phone');
        //存到session中
        session(['rand'=>$rand]);
        sendphone($phone,$rand);
        echo 1;
        
    }

}
