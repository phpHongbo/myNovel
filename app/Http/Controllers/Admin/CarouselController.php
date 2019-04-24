<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//轮播图管理
class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request)
    {
        $title = $request->search;
        $rs = DB::table('carousel')->where('name','like',"%{$title}%")->paginate($request->input('num',10));
        $id = 0;
        //加载展示页面
        return view('admin.carousel.index',['rs'=>$rs,'request'=>$request,'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加页面
        return view('admin.carousel.add');
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
        'image' => 'dimensions:min_width=900,ratio:18/7',
        'type'  =>'required',
        'status' =>'required',
        ],[
           'name.required' =>'名称不能为空!',
           'image.dimensions'=>'文件大小比例不符合(最小宽度是900,宽高比例为18:7)!',
           'type.required' =>'请选择类别',
           'status.required' =>'请选择状态',
        ]);
        //获取表单传过来的数据
        $rs = $request->except(['_token','image','uploadfile-2']);
        //文件上传处理
        //判断文件是否长传
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
               //获取文件信息
               $files = $request->file('image');
               //起名字
               $name = rand(1111,9999).time();
               //后缀
               $suffix = $files->getClientOriginalExtension();
               //移动到指定位置
               $files->move('./uploads/carousel/',$name.'.'.$suffix);
               $rs['image'] = '/uploads/carousel/'.$name.'.'.$suffix;
               //判断名称是否存在
                $res = DB::table('carousel')->where('name',$rs['name'])->first();
                if($res != null){
                    return back()->withInput()->with('err','名称已存在!');
                }
               //存储到数据表
               $data = DB::table('carousel')->insert($rs);
               if($data){
                   return redirect('/ciwei/lunbo')->with('success','添加成功!');
               }else{
                   return back()->withInput()->with('er','添加失败!'); 
               }
            }
        }else{
            return back()->withInput()->with('error','没有文件上传!');
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
        $res = DB::table('carousel')->where('id',$id)->first();
        //加载编辑页面
        return view('admin.carousel.edit',['res'=>$res]);
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
        'name'  =>'required',
        'image' => 'dimensions:min_width=900,ratio:18/7',
        'type'  =>'required',
        'status' =>'required',
        ],[
           'name.required' =>'名称不能为空!',
           'image.dimensions'=>'文件大小比例不符合(最小宽度是900,宽高比例为18:7)!',
           'type.required' =>'请选择类别',
           'status.required' =>'请选择状态',
        ]);
        //获取表单传过来的数据
        $rs = $request->except(['_token','image','uploadfile-2','_method']);
        //文件上传处理
        //判断文件是否长传
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
               //获取文件信息
               $files = $request->file('image');
               //起名字
               $name = rand(1111,9999).time();
               //后缀
               $suffix = $files->getClientOriginalExtension();
               //移动到指定位置
               $files->move('./uploads/carousel/',$name.'.'.$suffix);
               $rs['image'] = '/uploads/carousel/'.$name.'.'.$suffix;
               //判断名称是否存在
                $res = DB::table('carousel')->where('name',$rs['name'])->first();
                if($res != null){
                    return back()->withInput()->with('err','名称已存在!');
                }
               //删除文件
                //删除文件
                $res = DB::table('carousel')->select('image')->where('id',$id)->first();
                $oldname = $res->image;
                @unlink('.'.$oldname);
                //更改数据
                if(DB::table('carousel')->where('id',$id)->update($rs)){
                     return redirect('/ciwei/lunbo')->with('success','修改成功!');
                }else{
                     return back()->withInput()->with('er','修改失败!');
                }
            }
        }else{
            return back()->withInput()->with('error','没有文件上传!');
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
    //轮播图删除
    public function del(Request $request){
        //获取参数id
        $id = $request->input('id');
        //删除文件
        $res = DB::table('carousel')->select('image')->where('id',$id)->first();
        $oldname = $res->image;
        @unlink('.'.$oldname);
        //执行删除
        if(DB::table('carousel')->where('id',$id)->delete()){
             echo 1;
        }else{
             echo 0;
        }
    }
    //轮播图批量删除
    public function delall(Request $request){
        //获取数据
        $ids = $request->input('ids');
        array_shift($ids);
        $res = DB::table('carousel')->select('image')->whereIn('id',$ids)->get();
        foreach($res as $v)
        {
            @unlink('.'.$v->image);
        }
        //执行删除
        if(DB::table('carousel')->whereIn('id',$ids)->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }
    /**
     * 轮播图类别
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function type(Request $request)
    {
        //接受数据
        $type = $request->input('type');
        $name = $request->input('name');
        $table = $request->input('table');
        $res = DB::table("$table")->select('id')->where('title',$name)->first();
        if($res ==null){
            echo 0;
        }else{

            echo $res->id;
        }
    }
    /**
     * 轮播发布状态
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function status (Request $request) {
        //获取参数id
        $data['status'] = $request->input('status');
        $id = $request->input('id');
        //查询数据表中显示的条数
        if($request->status ==0){
            $rs = DB::table('carousel')->where('status',$request->status)->count();
            if($rs < 7) {
                
                 //执行更新
                if(DB::table('carousel')->where('id',$id)->update($data)){
                    echo 1;
                }else{
                    echo 0;
                }
            }else{
                return;
            }
        }else{
            //执行更新
            if(DB::table('carousel')->where('id',$id)->update($data)){
                echo 1;
            }else{
                echo 0;
            }
        }
    }
}
