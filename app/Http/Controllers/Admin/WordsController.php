<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request)
    {
        $search = $request->search;
        $res = DB::table('words')->where('name','like','%'.$search.'%')->paginate($request->input('num',10));
        $id =0;
        //加载敏感词列表
        return view ('admin.words.index',['res'=>$res,'id'=>$id,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加页面
        return view ('admin.words.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
        'name'  =>'required',
        ],[
           'name.required' =>'名称不能为空!',
        ]);
        //获取参数
        $data['name'] = $request->name;
        
        //判断敏感词是否已经存在
        $rs = DB::table('words')->where('name',$request->name)->first();
        if ($rs != null) {
            return back()->withInput()->with('err','名称已存在!');
        }
        //将数据插入敏感词表中
        if (DB::table('words')->insert($data)){
            $name = $request->name.'|';
            //放置敏感词文件
            $file  =  './minganci.txt' ;
            //将数据插入到敏感词文件中
            file_put_contents($file,$name,FILE_APPEND);
            return redirect('/ciwei/senwords')->with('success','添加成功!');
        } else {
             return back()->withInput()->with('error','添加失败!');
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
        $rs = DB::table('words')->where('id',$id)->first();
        return view ('admin.words.edit',['rs'=>$rs]);
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
        //根据id查询敏感词
        $rs = DB::table('words')->where('id',$id)->select('name')->first();
        //获取敏感词文件
        $filename  =  './minganci.txt' ;
        $file = file_get_contents($filename);
        $words = $rs->name.'|';
        //获取要编辑的敏感词出现的位置
        $count = strpos($file,$words);
        //获取表单编辑的敏感词
        $wname = $request->name.'|';
        //将原敏感词文件中的字符串替换
        $res = substr_replace($file,$wname,$count,strlen($words));
        //将新的敏感词重新写入文件
        file_put_contents($filename,$res);
        $data['name'] = $request->name;
        //执行编辑
        if(DB::table('words')->where('id',$id)->update($data)) {
            return redirect('/ciwei/senwords')->with('success','修改成功!');
        } else {
            return back()->withInput()->with('error','修改失败!');
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

    //推荐删除
    public function del (Request $request) {
        //获取参数id
        $id = $request->input('id');
        //根据id查询敏感词
        $rs = DB::table('words')->where('id',$id)->select('name')->first();
        //获取敏感词文件
        $filename  =  './minganci.txt' ;
        $file = file_get_contents($filename);
        $words = $rs->name.'|';
        //获取要删除的敏感词出现的位置
        $count = strpos($file,$words);
        $res = substr_replace($file,"",$count,strlen($words));
        //将剩余的敏感词重新写入文件
        file_put_contents($filename,$res);
        //执行删除
        if(DB::table('words')->where('id',$id)->delete()){
             echo 1;
        }else{
             echo 0;
        }
    }
}
