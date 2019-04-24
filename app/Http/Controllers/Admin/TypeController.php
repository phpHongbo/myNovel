<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//小说分类管理
class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取分类表里面的数据
        $res = DB::table('novel_type')->get();
        //加载分类页面
        return view('admin.type.index',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加分类页面
        return view('admin.type.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //获取表单提交数据并清除不需要的数据
         $data = $request->except('_token');
         //数据验证
         //数据验证:
        $this->validate($request, [
            'name' => 'required',
        ],[
            'name.required' =>'分类名称不能为空',
        ]);
         //将数据插入的数据库中
         $res  = DB::table('novel_type')->insert($data);
         if($res){
              //数据添加成功的同时 设置session信息
              return redirect('/ciwei/type')->with('success','添加成功');
         }else{
              return back()->with('error','添加失败');
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
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //通过id查询数据
         $res = DB::table('novel_type')->where('id',$id)->first();
         //加载编辑页面
         return view('admin.type.edit',['res'=>$res]);
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
         $data = $request->except(['_token','_method']);
         if(DB::table('novel_type')->where('id',$id)->update($data)){
              return redirect('/ciwei/type')->with('success','修改成功');
         }else{
              return back()->with('error','修改失败');
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
    //分类删除
    public function del(Request $request){
        //获取参数id
        $id = $request->input('id');
        //执行删除
        if(DB::table('novel_type')->where('id',$id)->delete()){
             echo 1;
        }else{
             echo 0;
        }
    }
    //分类批量删除
    public function delall(Request $request){
        //获取数据
        $ids = $request->input('ids');
        array_shift($ids);
        //执行删除
        if(DB::table('novel_type')->whereIn('id',$ids)->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }
    //分类隐藏状态
    public function stop (Request $request) {
        //获取参数id
        $data['status'] = $request->input('status');
        $id = $request->input('id');
          
        //执行更新
        if(DB::table('novel_type')->where('id',$id)->update($data)){
            echo 1;
        }else{
            echo 0;
        }
    }
}
