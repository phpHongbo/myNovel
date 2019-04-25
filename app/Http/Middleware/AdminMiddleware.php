<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session('admin')) {
            //获取当前 Laravel 项目的控制器或者方法名
            $rs = request()->route()->getActionName();
             // 判断   你点击的路径有没有在表里面的权限路径
            if(in_array($rs, session('nodelist'))){

                return $next($request);
            } else {
                //跳转
                return redirect('/ciwei/roleper')->with('error','抱歉,您没有权限访问');
            }
            // return $next($request);
        } else {
            return redirect('/ciwei/login');
        }
    }
}
