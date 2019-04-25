<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequest;
use App\Model\Admin\Admin;
use App\Model\Admin\Role;
use Hash;
use DB;
class AdminController extends Controller
{
    /**
     * 管理员列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询出所有的管理员
        $data = Admin::all();
        $count = Admin::count();
        $i = 1;
        return view('admin.admin.index',[
            'data'=>$data,
            'i'=>$i,
            'count'=>$count
        ]);
    }

    /**
     * 添加管理员
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create',['title'=>'管理员添加']);
    }

    /**
     * 管理员添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequest $request)
    {
        $data = $request->except(['_token','repassword','']);
        // dump($data);
        //哈希加密
        $data['password'] = Hash::make($request->password); 
        //执行插入
        if(Admin::create($data)){
            return redirect('/ciwei/admin')->with('success','添加成功');
        }else{
            return redirect('/ciwei/admin')->with('error','添加失败');
        }
    }

    /**
     * 管理员启用、禁用
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function status(Request $request)
    {
        //获取id和状态
        $id = $request->input('id');
        $status = $request->input('status');
        //执行修改
        if(Admin::where("id","{$id}")->update(['status'=>$status])){
            echo 1;
        }else{
            echo '修改失败！';
        }
    }

    //查看个人信息
    public function myselfinfo()
    {
        //根据登录后的管理员id查询对应管理员信息
        $id = session('id');
        $res = Admin::find($id);
        $role = [];
        $node = [];
        foreach($res->getrole as $v)
        {
            $role[] = $v->rolename;
            foreach($v->getnode as $val)
            {
                $node[] = $val->name;
            }
        }
        return view('admin.admin.myselfinfo',[
            'res'=>$res,
            'role'=>$role,
            'node'=>$node
        ]);
    }
    /**
     * [show description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id)
    {
        //
    }
    
    /**
     * 修改管理员密码页
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password($id)
    {
        //获取用户id
        $res = Admin::find($id);
        return view('admin.admin.password',[
            'res'=>$res,
            'title'=>'修改密码'
        ]);
    }

    /**
     * 处理修改密码方法
     * @return [type] [description]
     */
    public function dopassword(Request $request)
    {
        //获取id
        $id = $request->input('id');
        //表单验证
        $this->validate($request, [
            'password' => 'required|regex:/^\S{6,15}$/',
            'repassword' => 'required|same:password'
        ],[
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'repassword.required'=>'确认密码不能为空',
            'repassword.same'=>'两次密码不一致'
        ]);
        //获取数据
        $data = $request->except(['_token','repassword']);
        //加密
        $data['password'] = Hash::make($request->password);
        //执行修改密码
        if(Admin::where("id","{$id}")->update($data)){
            return redirect('/ciwei/admin')->with('success','修改成功');
        }else{
            return redirect('/ciwei/admin')->with('error','修改成功');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd(request()->route()->getActionName());
        //获取对应id的管理员信息
        $res = Admin::find($id);
        //查询出所有的角色
        $role = Role::get(['id','rolename']);
        //获取用户的相关信息
        $rs = $res->getrole;

        $ar = [];
        foreach($rs as $k => $v){
            $ar[] = $v->id;
        }
        return view('admin.admin.edit',[
            'res'=>$res,
            'title'=>'管理员编辑页面',
            'role'=>$role,
            'ar'=>$ar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //表单验证
        $this->validate($request, [
            'email' => 'required|regex:/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/',
            'phone' => 'required|regex:/^1[3456789]\d{9}$/',
            'role' => 'required'
        ],[
            'phone.required'=>'手机号码不能为空',
            'phone.regex'=>'手机号码格式不正确',
            'email.regex'=>'邮箱格式不正确',
            'email.required'=>'邮箱不能为空',
            'role.required'=>'管理员角色不能为空'
        ]);
        //获取数据
        $data = $request->except('_token','_method','role');
        // dd($data);
        //获取角色的所有id
        $rs = $request->input('role');
        //表 user_role
        //根据用户的id删除信息
        DB::table('user_role')->where('uid',"{$id}")->delete();

        $res = [];
        foreach($rs as $k => $v){
            $info = [];

            $info['uid'] = $id;

            $info['rid'] = $v;

            $res[] = $info;
        }
        //把拼接号的信息 插入到数据表中
        $bool = DB::table('user_role')->insert($res);
        //执行修改
        if(Admin::where("id","{$id}")->update($data) || $bool){
            return redirect('/ciwei/admin')->with('success','修改成功');
        }else{
            return redirect('/ciwei/admin')->with('error','修改失败');
        }
    }

    /**
     * 个人修改密码页
     */
    public function showpass()
    {
        return view('admin.admin.showpass',['title'=>'修改密码']);
    }

    /**
     * 处理个人修改
     * @return [type] [description]
     */
    public function dopass(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required|regex:/^\S{6,15}$/',
            'password' => 'required|regex:/^\S{6,15}$/',
            'repassword' => 'required|same:password'
        ],[
            'oldpassword.required'=>'旧密码不能为空',
            'oldpassword.regex'=>'旧密码格式不正确',
            'password.required'=>'新密码不能为空',
            'password.regex'=>'新密码格式不正确',
            'repassword.required'=>'确认密码不能为空',
            'repassword.same'=>'两次密码不一致'
        ]);
        //获取管理员id
        $id = session('id');
        //获取密码、加密
        $password = Hash::make($request->password);
        //执行修改
        if(Admin::where("id","{$id}")->update(['password'=>$password])){
            return redirect('/ciwei/admin')->with('success','修改成功');
        }else{
            return redirect('/ciwei/admin')->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
