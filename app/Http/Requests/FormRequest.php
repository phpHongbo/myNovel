<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequest extends FormRequest
{
    /**
     * 判断用户是否有权限做出此请求
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:admin|regex:/^\w{5,15}$/',
            'password' => 'required|regex:/^\S{6,15}$/',
            'repassword' => 'required|same:password',
            'email' => 'required|regex:/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/',
            'phone' => 'required|regex:/^1[3456789]\d{9}$/'
        ];
    }

    /**
     * 错误信息提示
     * @return [type] [description]
     */
    public function messages()
    {
        return [
            'name.required'=>'管理员名称不能为空',
            'name.regex'=>'管理员名称格式不正确',
            'name.unique'=>'管理员已存在',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'repassword.required'=>'确认密码不能为空',
            'repassword.same'=>'两次密码不一致',
            'phone.required'=>'手机号码不能为空',
            'phone.regex'=>'手机号码格式不正确',
            'email.email'=>'邮箱格式不正确',
            'email.required'=>'邮箱不能为空',
        ];
    }
}
