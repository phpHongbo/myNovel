<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Role;
use App\Model\Admin\Node;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询出所有的角色
        // dd(request()->route()->getActionName());
        $res = Role::all();
        $count = Role::count();
        $i = 1;
        return view('admin.role.index',[
            'res'=>$res,
            'i'=>$i,
            'count'=>$count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //查询出所有的权限
        $node = Node::get(['id','name']);
        return view('admin.role.create',['node'=>$node]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'rolename' => 'required',
            'node' => 'required'
        ],[
            'rolename.required'=>'角色名称不能为空',
            'node.required'=>'角色权限不能为空'
        ]);
        //获取数据
        $data = $request->except(['_token','node']);
        //添加角色
        $role= new Role($data);
        $role->save();
        //获取角色id
        $id = $role->id;
        //获取角色的所有id
        $rs = $request->input('node');
        $res = [];
        foreach($rs as $k => $v){
            $info = [];

            $info['rid'] = $id;

            $info['nid'] = $v;

            $res[] = $info;
        }
        //把拼接号的信息 插入到数据表中
        if(DB::table('role_node')->insert($res)){
            return redirect('/ciwei/role')->with('success','添加成功');
        }else{
            return redirect('/ciwei/role')->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取对应的角色信息
        $res = Role::find($id);
        //查询出所有的权限
        $node = Node::get(['id','name']);
        //获取用户的相关信息
        $rs = $res->getnode;

        $ar = [];
        foreach($rs as $k => $v){
            $ar[] = $v->id;
        }
        return view('admin.role.edit',[
            'res'=>$res,
            'ar'=>$ar,
            'node'=>$node
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
        // dump($request->all());
        $this->validate($request, [
            'rolename' => 'required',
            'node' => 'required'
        ],[
            'rolename.required'=>'角色名称不能为空',
            'node.required'=>'角色权限不能为空'
        ]);
        //获取数据
        $data = $request->except(['_token','_method','node']);
        // dump($data);
        //获取角色的所有id
        $rs = $request->input('node');
        //根据角色的id删除信息
        DB::table('role_node')->where('rid',"{$id}")->delete();

        $res = [];
        foreach($rs as $k => $v){
            $info = [];

            $info['rid'] = $id;

            $info['nid'] = $v;

            $res[] = $info;
        }
        //把拼接号的信息 插入到数据表中
        $bool = DB::table('role_node')->insert($res);
        //执行修改
        if(Role::where("id","{$id}")->update($data) || $bool){
            return redirect('/ciwei/role')->with('success','修改成功');
        }else{
            return redirect('/ciwei/role')->with('error','修改失败');
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
        //根据id删除
        if(Role::destroy($id)){
            return redirect('/ciwei/role')->with('success','删除成功');
        }else{
            return redirect('/ciwei/role')->with('success','删除失败');
        }
    }
}
