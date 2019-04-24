<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Novel;
use App\Model\Admin\Residence;
//宅文推荐管理
class ResidenceController extends Controller
{
	/**
	 * 宅文推荐首页
	 * @return [type] [description]
	 */
    public function index (Request $request) {
        $title = $request->search;
        $res = DB::table('residence')->leftJoin('novel', 'residence.nid', '=', 'novel.id')->select('novel.*','residence.id as rid','residence.status')->where('novel.title','like',"%{$title}%")->paginate($request->input('num',10));
        // dd($res);
        $id = 0;
        //加载首页页面
        return view('admin.residence.index',['res'=>$res,'id'=>$id,'request'=>$request]);
    }
    //点击率
    public function click () {
        $res = DB::table('novel')->select('id','title','state','click')->orderBy('click','desc')->paginate(10);
        $id = 1;
        //加载首页页面
        return view('admin.residence.click',['res'=>$res,'id'=>$id]);
    }
    public function addclick (Request $request) {
    	//获取参数id	
    	$data['nid'] = $request->id;
    	//通过nid查询推荐表判断是否已存在
    	$rs = DB::table('residence')->where('nid',$request->id)->first();
    	if ($rs!=null) {
            return '小说已存在';
    	}
    	//将小说id插入到推荐表中
    	if(DB::table('residence')->insert($data)){
            echo 1;
    	}else{
    		echo 0;
    	}
    }
    //推荐率
    public function tuijian () {
    	$res = DB::table('novel')->select('id','title','state','recommend')->orderBy('recommend','desc')->paginate(10);
        $id = 1;
        //加载首页页面
        return view('admin.residence.tuijian',['res'=>$res,'id'=>$id]);
    }
    //显示隐藏状态
    public function status (Request $request) {
        //获取参数id
        $data['status'] = $request->input('status');
        $id = $request->input('id');
    	//查询数据表中显示的条数
    	if($request->status ==1){

	    	$rs = DB::table('residence')->where('status',$request->status)->count();
	        if($rs < 7) {
	        	
	        	 //执行更新
		        if(DB::table('residence')->where('id',$id)->update($data)){
		            echo 1;
		        }else{
		            echo 0;
		        }
	        }else{
	        	return;
	        }
    	}else{
	          //执行更新
	        if(DB::table('residence')->where('id',$id)->update($data)){
	            echo 1;
	        }else{
	            echo 0;
	        }
        
    	}
    }

    public function del (Request $request) {
    	//获取参数id
        $id = $request->input('id');
        //执行删除
        if(DB::table('residence')->where('id',$id)->delete()){
             echo 1;
        }else{
             echo 0;
        }
    }
}
