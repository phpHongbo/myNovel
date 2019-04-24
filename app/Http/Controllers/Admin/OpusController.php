<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Type;
use App\Model\Admin\Chapter;
use App\Model\Admin\Chapters;
use DB;
//作品管理
class OpusController extends Controller
{
    public function index () 
    {
        //查询分类表里面的数据
        $res = Type::all();
        $id = 1;
    	//加载作品列表
    	return view ('admin.opus.index',['res'=>$res,'id'=>$id]);
    }
    /**
     * 作品审核列表
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function examine ($id) {
         $rs = DB::select("select `no`.title as ntit,`no`.state,c.id as cid,c.title as ctit,c.`status` as csta,c.addtime,CONCAT(`no`.id,',',c.nid) AS path from novel as no,novel_type as type,chapter as c WHERE `no`.typeid = type.id and c.nid = `no`.id and `no`.typeid = {$id}   ORDER BY path ASC");
                  // ->join('novel_type','novel.typeid','=','novel_type.id')
                  // ->join('chapter','novel.id','=','chapter.nid')
                  // ->select('novel.title as ntit','novel.state','novel.nature','novel.status as nsta','chapter.*')
                  // ->where('novel_type.id','=','$id')
                  // ->get();
         $id =1;
         // dd($rs[0]->ntit);
         //加载审核列表
         return view ('admin.opus.examine',['res'=>$rs,'id'=>$id]);
    }
    /**
     * 作品章节内容审核
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function chapter_list ($id) 
    {
        // $rs = DB::select("SELECT c.title,cs.content from chapter as c,chapters as cs WHERE c.id = cs.cid AND c.id = {$id}");
        $rs = Chapter::with('chapterinfo:cid,content')->where('id',$id)->first(['id','title','status']);
    	return view('admin.opus.check',['rs'=>$rs]);
    }
    public function chapter_check (Request $request) 
    {
    	$id = $request->id;
    	$data['status'] = $request->status;
    	$rs = Chapter::where('id',$id)->update($data);
    	echo $rs;
    }
}
