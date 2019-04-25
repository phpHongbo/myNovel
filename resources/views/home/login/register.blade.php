@extends('layout.home') 
@section('title',$title)
@section('main')
<!--container start-->
<style>
    .Validform_wrong{
        color:red;
    }
    .Validform_right{
        color:green;
    }
</style>
<script src="/home/static/js/Validform_v5.3.2_ncr_min.js"></script>
<div class="container container-login">
    <div class="ly-wrap">
        <div class="login-box">
            <div class="form-box" id="J_RegisterForm">
                <ul class="login-title clearfix">
                    <li class="J_ChangeRegType active" data-type="mobile" id="mobile">手机注册</li>
                    <li class="J_ChangeRegType" data-type="email" id="email">邮箱注册</li>
                </ul>
                <form class="form-moblie demoform" name="mobile">
                    <div class="input-group mobile-group type-mobile">
                        <input type="text" placeholder="手机号" class="mobile" name="username" datatype="m" errormsg="请输入正确的手机号码" value="{{ old('mobile') }}">
                        <div class="dropdown select-dropdown ly-fl" id="J_MobileAreaBox">
                            <a class="btn dropdown-toggle icon-caret" href="javascript:;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">+86</a>
                            {{csrf_field()}}
                            <!-- <ul class="J_mCustomScrollbar dropdown-menu">
                                 <li class="selected" data-value="1" data-pattern="^(86){0,1}1\d{10}$" data-code="86">中国大陆 <b>+86</b></li></ul> -->
                        </div>
                    </div>
                    <div class="input-group type-mobile">
                        <div class="form-group">
                            <input type="text" placeholder="短信验证" class="receive-code receive-code-mobile" datatype="/^\d{4}$/" maxlength="4" name="rand">
                            <button class="btn-receive-code" id="receive-mobile"><span>获取短信验证码</span><b class="J_Timer" style="display:none"><i>60</i>秒</b></button>
                           <!--  <div class="wrongBox">
                                <b>*</b>
                                <span class="tip-msg">请输入注册手机收到的4位验证码</span>
                            </div> -->
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="8~16位密码，字母或数字组成" class="password" maxlength="16" name="password" datatype="/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/"  errormsg="8~16位密码，字母或数字组成！">
                    </div>
                    <div class="btn-group">
                        <button id="geetest-submit" class="btn btn-warning" type="submit">注册</button>
                    </div>
                </form>
                <form class="form-email demoform" style="display:none" name="email">
                    <div class="input-group type-email  email-group">
                        <input type="text" placeholder="邮箱" class="email" name="username" datatype="/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/"  errormsg="请输入正确的邮箱地址" value="{{ old('email') }}">
                    </div>         
                    <div class="input-group type-email">
                        <div id="" class="form-group">
                            <input type="text" placeholder="邮箱验证" class="receive-code receive-code-email" maxlength="4" name="rand"><button class="btn-receive-code" id="receive-email"><span>获取邮箱验证码</span><b class="J_Timer" style="display:none"><i>60</i>秒</b></button>
                            <!-- <div class="wrongBox">
                                <b>*</b>
                                <span class="tip-msg">请输入注册邮箱收到的4位验证码</span>
                            </div> -->
                        </div>
                    </div>
                            {{csrf_field()}}
                    <div class="input-group">
                        <input type="password" placeholder="8~16位密码，字母或数字组成" class="password" maxlength="16" name="password" datatype="/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/"  errormsg="8~16位密码，字母或数字组成！">
                    </div>
                    <div class="btn-group">
                        <button id="geetest-submit" class="btn btn-warning" type="submit">注册</button>
                    </div>
                </form>
                <div class="form-ft clearfix">
                    <span class="tl">
                            <label><input type="checkbox" checked>我已阅读并同意</label><a href="https://www.ciweimao.com/signup/protocol" target="_blank">《用户服务协议》</a><br/>
                            <a href="https://www.ciweimao.com/game/game_protocol" target="_blank">《网络游戏服务格式化协议必备条款》</a>
                        </span>
                    <span class="tr">
                        <a href="/login">直接登录 &gt;</a>
                    </span>
                </div>
            </div>
            <div class="login-ft">
                    <div class="otherUser">
                        <div class="otherUser_T">使用第三方账号登录</div>
                        <div class="otherUser_B">
                            <a href="https://www.ciweimao.com/signup/qqlogin?redirect=https://www.ciweimao.com/index-game" class="qqLogin"></a>
                            <!--<a href="javascript:;" class="wbLogin"></a>-->
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<style>
    button{
        cursor:pointer;
    }
</style>
<script src="/home/static/js/find.js"></script>
<script>
    $(".demoform").Validform({
        tiptype:4
    });
    /*手机注册*/
    $('#mobile').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
        $('.form-moblie').css('display','block').siblings('form').css('display','none');
    });
    /*邮箱注册*/
    $('#email').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
        $('.form-moblie').css('display','none').siblings('form').css('display','block');
    });
    /*获取手机验证码*/
    $("#receive-mobile").click(function(){
        //获取手机号
        var mobile = $('form[name=mobile] input[name=username]').val();
        if(mobile == ""){
            $("#username-error").remove();
            var label = $('<label id="username-error" class="error" for="username">请填写手机号</label>');
            $('.mobile-group').append(label);
            return false; 
        }
        //判断手机号格式
        if(!mobile.match(/^1[34578]\d{9}$/)){
            $("#username-error").remove();
            var label = $('<label id="username-error" class="error" for="username">请填写正确的手机号</label>');
            $('.mobile-group').append(label);
            return false; 
        }
        if(findphone(mobile) == 1){
            return false;
        }
        $(this).children('span').css('display','none').next().css('display','block');
        var that = $(this);
        //发送ajax发送验证码
        $.ajax({
            type:'GET',
            url:'/getphone',
            data:'phone='+mobile,
            success:function(data){
                // console.log(data);return;
                if(data == 1){
                    //开启定时器倒计时
                    layer.msg('发送成功',{icon: 6,time:1000});
                    var num = 60;
                    var cw = that.children();
                    that.attr('disabled', true);
                    cw.text('60');
                    clearInterval(timmer);
                    var timmer = setInterval(function(){
                        num--;
                        cw.text(num);
                        if(num == 0){
                            clearInterval(timmer);
                            cw.text('重新发送');
                            cw.parent().prop('disabled',false);
                       }
                    },1000);
                }
            }
        })
    });
    $('.mobile').blur(function(){
        var phone = $(this).val();
        if(phone == ''){
            return;
        }
        if(findphone(phone) == 1){
            $(".mobile").siblings('.Validform_right').remove();
            $("#username-error").remove();
            var label = $('<label id="username-error" class="error" for="username">此手机号已注册</label>');
            $('.mobile-group').append(label);
        }
    });
    $('.mobile').focus(function(){
        $("#username-error").remove();
    });
    $('.email').blur(function(){
        var email = $(this).val();
        if(email == ''){
            return;
        }
        if(findemail(email) == 1){
            $(".email").siblings('.Validform_right').remove();
            $("#username-error").remove();
            var label = $('<label id="username-error" class="error" for="username">此邮箱已注册</label>');
            $('.email-group').append(label);
            bool = false;
        }
    });
    $('.email').focus(function(){
        $("#username-error").remove();
    });
    /*获取邮箱验证码*/
    $("#receive-email").click(function(){
        //获取邮箱
        var email = $('form[name=email] input[name=username]').val();
        if(email == ""){
            $("#username-error").remove();
            var label = $('<label id="username-error" class="error" for="username">请填写邮箱</label>');
            $('.email-group').append(label);
            return false; 
        }
        //判断邮箱格式
        if(!email.match(/^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,4}$/)){
            $("#username-error").remove();
            var label = $('<label id="username-error" class="error" for="username">请填写正确的邮箱</label>');
            $('.email-group').append(label);
            return false; 
        }
        if(findemail(email) == 1){
            return false;
        }
        $(this).children('span').css('display','none').next().css('display','block');
        var that = $(this);
        //发送ajax发送验证码
        $.ajax({
            type:'GET',
            url:'/getemail',
            data:'email='+email,
            success:function(data){
                if(data == 1){
                    //开启定时器倒计时
                    layer.msg('发送成功',{icon: 6,time:1000});
                    var num = 60;
                    var cw = that.children();
                    that.attr('disabled', true);
                    cw.text('60');
                    clearInterval(timmer);
                    var timmer = setInterval(function(){
                        num--;
                        cw.text(num);
                        if(num == 0){
                            clearInterval(timmer);
                            cw.text('重新发送');
                            cw.parent().prop('disabled',false);
                       }
                    },1000);
                }
            }
        })
    });
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('form').submit(function(){
    if(!$(':checked').prop('checked')){
        layer.msg('请同意用户服务协议',{icon: 5,time:1000});
        return;
    }
    type = $(this).attr('name');
    username = $(`form[name = ${type}] input[name=username]`).val();
    rand = $(`form[name = ${type}] input[name=rand]`).val();
    password = $(`form[name = ${type}] input[name=password]`).val();
    //console.log(captcha);
    // console.log(type,username,rand,password);
    if(!type || !username || !rand || !password){
        return false;
    }
    //发送ajax
    $.post('/doregister',{'type':type,'username':username,'rand':rand,'password':password},function(data){
        if(data == 1){
            layer.msg("注册成功",{icon: 6,time:1000},function(){
                location.href="/login";
            });
        }else{
            layer.msg(data,{icon: 5,time:1000});
        }
    })
    return false;
})
@if(session('error'))
    setTimeout(function(){
        layer.msg("{{ session('error') }}",{icon: 5,time:1000});
    },100);
@endif
</script>
@endsection
<!--container end-->
