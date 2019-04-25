<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Users;

class UsersController extends Controller
{
    /**
     * 展示用户
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $i = 0;
        //多条件的查询
        $data = Users::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->search;
                $email = $request->email;
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('username','like','%'.$username.'%');
                }
                //如果邮箱不为空
                if(!empty($email)) {
                    $query->where('email','like','%'.$email.'%');
                }
            })->paginate($request->input('num', 10));
        return view('admin.users.index',[
            'data'=>$data,
            'i'=>$i,
            'request'=>$request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = Users::find($id);
        $usersinfo = $users->usersinfo;
        // dump($res);
        return view('admin.users.show',['users'=>$users,'usersinfo'=>$usersinfo]);
    }

    public function status(Request $request)
    {
        //获取id
        $id = $request->input('id');
        //获取状态
        $status = $request->input('status');
        //修改状态
        if(Users::where("id","{$id}")->update(['status'=>$status])){
            echo 1;
        }else{
            echo '修改失败';
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
        //
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
