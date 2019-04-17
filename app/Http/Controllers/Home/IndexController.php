<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	//显示前台首页
    public function index() {
    	//
    	return view('home.index',['title'=>'刺猬猫官网_贼新贼全的综漫小说阅读网，火影小说，海贼小说，动漫小说，动漫同人']);
    }
}
