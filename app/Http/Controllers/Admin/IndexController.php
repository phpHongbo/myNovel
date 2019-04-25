<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
class IndexController extends Controller
{
    public function index()
    {
    	$role = implode(session('role'),'、');
    	return view("admin/index",['role'=>$role]);
    }

    public function welcome()
    {
    	return view("admin/welcome");
    }
}
