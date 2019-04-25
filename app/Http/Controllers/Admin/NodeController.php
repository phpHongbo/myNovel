<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Node;
class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //查询出所有权限节点
        $res = Node::where('name','like','%'.$request->name.'%')->get();
        $count = Node::count();
        $i = 1;
        return view('admin.node.index',['res'=>$res,'i'=>$i,'count'=>$count,'name'=>$request->name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.node.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取数据
        $data = $request->except('_token');
        //执行添加
        if(Node::insert($data)){
            return redirect('/ciwei/node')->with('success','添加成功');
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
        //查询对应权限节点
        $res = Node::find($id);
        return view('admin.node.edit',['res'=>$res]);
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
        //获取数据
        $data = $request->except(['_token','_method']);
        if(Node::where("id","{$id}")->update($data)){
            return redirect('/ciwei/node')->with('success','修改成功');
        }else{
            return redirect('/ciwei/node')->with('error','修改失败');
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
        //通过id删除权限节点
        if(Node::destroy($id)){
            return redirect('/ciwei/node')->with('success','删除成功');
        }else{
            return redirect('/ciwei/node')->with('error','删除失败');
        }
    }
}
