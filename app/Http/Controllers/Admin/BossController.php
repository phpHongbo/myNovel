<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Novel;
use App\Model\Admin\Boss;
class BossController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = $request->search;
        $res = DB::table('boss')->leftJoin('novel', 'boss.nid', '=', 'novel.id')->select('boss.*','novel.title','novel.state')->where('novel.title','like',"%{$title}%")->paginate($request->input('num',10));
        $id = 0;
        // dd($res);
        //加载列表页面
        return view('admin.boss.index',['res'=>$res,'id'=>$id,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加页面
        return view('admin.boss.add');
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
        'status' =>'required',
        ],[
           'name.required' =>'名称不能为空!',
           'status.required' =>'请选择状态',
        ]);
        $data['nid'] = $request->nid;
        $data['title'] = $request->name;
        $data['status'] = $request->status;
        //判断名称是否存在
        $res = DB::table('boss')->where('nid',$data['nid'])->first();
        if($res != null){
            return back()->withInput()->with('err','名称已存在!');
        }
        $rs = DB::table('boss')->insert($data);
        if($rs) {
            return redirect('/ciwei/boss')->with('success','添加成功!');
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
        //
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
    //检测小说是否存在
    public function check (Request $request) {
        $title =$request->input('name');
        $rs = DB::table('novel')->select('id')->where('title',$title)->first();
         if($rs ==null){
            echo 0;
        }else{

            echo $rs->id;
        }
    }
    //推荐显示隐藏
    public function stores (Request $request) {
        //获取参数id
        $data['status'] = $request->input('status');
        $id = $request->input('id');
        //查询数据表中显示的条数
        if($request->status ==1){

            $rs = DB::table('boss')->where('status',$request->status)->count();
            if($rs < 7) {
                
                 //执行更新
                if(DB::table('boss')->where('id',$id)->update($data)){
                    echo 1;
                }else{
                    echo 0;
                }
            }else{
                return;
            }
        }else{
              //执行更新
            if(DB::table('boss')->where('id',$id)->update($data)){
                echo 1;
            }else{
                echo 0;
            }
        
        }
    }
    //推荐删除
    public function del (Request $request) {
        //获取参数id
        $id = $request->input('id');
        //执行删除
        if(DB::table('boss')->where('id',$id)->delete()){
             echo 1;
        }else{
             echo 0;
        }
    }
}
