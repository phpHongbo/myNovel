@extends('layout.home') 
@section('title',$title)
@section('main')
<!--container start-->
<style>
    #captcha{
        width:120px;
        height:40px;
        margin-top:-8px;
    }
    #captcha:hover{
       cursor:pointer;
    }
</style>
<div class="container container-login">
    <div class="ly-wrap">
        <div class="login-box">
            <form action="/dologin" class="form-box" method="post" name="J_LoginForm" id="J_LoginForm">
                <input type="hidden" name="redirect" value="https://www.ciweimao.com/index-game">
                <h3>登录</h3>
                <div class="input-group">
                    <input type="text" placeholder="手机号/邮箱" class="username" name="username" id="username" value="{{ old('username') }}">
                </div>
                <div class="input-group">
                    <input type="password" placeholder="密码" class="password" name="password">
                </div>
                <div class="input-group code-group">
                    <div id="embed-geetest-captcha"></div>
                    <input type="text" placeholder="请输入验证码" class="username" name="captcha" style="width:180px">
                    <img src="/captcha" alt="" onclick='this.src = this.src+="?1"' style='border-radius:3px' id="captcha"><br/>
                    <a href="javascript:;" style="float:right;margin-right:25px;margin-top:-10px;" onclick="captcha()">看不清，换一张</a>
                </div>
                <div class="btn-group">
                    <button id="geetest-submit" class="btn btn-warning" type="submit">登录</button>
                </div>
                {{ csrf_field() }}
                <div class="form-ft clearfix">
                    <span class="tl">
                            <label><input checked="checked" name="autoLogin" value="1" type="checkbox">自动登录</label>
                        </span>
                    <span class="tr">
                        <a href="/forget">忘记密码&nbsp;&nbsp;|&nbsp;</a>
                        <a href="/register">注册</a>
                    </span>
                </div>
            </form>
            <div class="login-ft">
                <div class="otherUser">
                    <div class="otherUser_T"><span>使用其他账号登录</span><b></b></div>
                    <div class="otherUser_B">
                        <a href="javascript:;" class="qqLogin"></a>
                        <!-- <a href="https://www.ciweimao.com/signup/weixin_login" class="weixinLogin"></a> -->
                        <!--                        <a href="javascript:;" class="qqLogin"></a>-->
                        <!-- <a href="javascript:;" class="wbLogin"></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    /*账户格式验证*/
    function name(){
        var username = $('input[name=username]').val();
        if(username == ""){
            $("#username-error").remove();
            var label = $('<label id="username-error" class="error" for="username">请填写手机号或邮箱</label>');
            $('input[name=username]').parent().append(label);
            return false; 
        }
        if((!username.match(/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/)) && (!username.match(/^1[34578]\d{9}$/))){
            $("#username-error").remove();
            var label = $('<label id="username-error" class="error" for="username">手机号或邮箱不合法</label>');
            $('input[name=username]').parent().append(label);
            return false; 
        }
        return true;
    }
    $('input[name=username]').focus(function(){
        $("#username-error").remove();
    });

    /*密码格式验证*/
    function password(){
        var password = $('input[name=password]').val();
        if(password == ""){
            $("#password-error").remove();
            var label = $('<label id="password-error" class="error" for="password">请填写密码</label>');
            $('input[name=password]').parent().append(label);
            return false; 
        }
        if(!password.match(/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/)){
            $("#password-error").remove();
            var label = $('<label id="password-error" class="error" for="username">请输入由字母数字组成的8-16位密码</label>');
            $('input[name=password]').parent().append(label);
            return false; 
        }
        return true;
    }
    $('input[name=password]').focus(function(){
        $("#password-error").remove();
    });
    /*提交按钮验证是否允许提交*/
    $('.form-box').submit(function(){
        if(!name() || !password()){
            return false;
        }
    });
    /*更新验证码*/
    function captcha(){
        $('#captcha').attr('src',$('#captcha').attr('src')+"?1");
    }
    // layer.msg('Hello World');
    /*提示验证失败*/
    setTimeout(function(){
         @if(session('error'))
            layer.msg("{{session('error')}}",{icon: 5,time:1000});
        @endif
    },100);
   
</script>
@endsection