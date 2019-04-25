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
            <form class="form-box demoform" id="J_ModifyPassForm" method="post">
                <ul class="login-title clearfix">
                    <li class="J_ChangeRegType active" data-type="mobile">手机找回</li>
                    <li class="J_ChangeRegType" data-type="email">邮箱找回</li>
                </ul>
                <div class="input-group mobile-group type-mobile">
                    <input type="text" placeholder="手机号" class="mobile" name="mobile" datatype="m" errormsg="请输入正确的手机号码">
                    <div class="dropdown select-dropdown ly-fl" id="J_MobileAreaBox">
                        <a class="btn dropdown-toggle icon-caret" href="javascript:;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">+86</a>
                    </div>
                </div>
                <div class="input-group type-email email-group hide">
                    <input type="text" placeholder="常用邮箱" class="email" name="email">
                </div>
                <div class="input-group type-mobile">
                        <input type="text" placeholder="短信验证码" class="receive-code receive-code-mobile" maxlength="5" name="receive-code-mobile" datatype="/^\d{4}$/" maxlength="4">
                        <a href="javascript:;" class="btn-receive-code" id="J_GetMobileReceiveCode">
                            <span>获取验证码</span>
                            <b class="J_Timer" style="display:none"><i>60</i>秒</b>
                        </a>
                    </div>
                <div class="input-group type-email hide">
                        <input type="text" placeholder="邮箱验证码" class="receive-code receive-code-email" maxlength="4" name="receive-code-email" datatype="/^\d{4}$/" maxlength="4">
                        <a href="javascript:;" class="btn-receive-code" id="J_GetEmailReceiveCode">
                            <span>获取验证码</span>
                            <b class="J_Timer" style="display:none"><i>60</i>秒</b>
                        </a>
                    </div>
                
                <div class="input-group">
                        <input type="password" placeholder="8~16位密码，字母或数字组成" class="password" maxlength="16" name="password" datatype="/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,16}$/"  errormsg="8~16位密码，字母或数字组成！">
                    </div>
                    <div class="input-group">
                        <input type="password" placeholder="请再次输入密码" class="password-confirm" maxlength="16" name="repassword" recheck="password" errormsg="您两次输入的密码不一致！">
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-warning" type="submit"  id="geetest-submit">修改密码</button>
                    </div>
                    <div class="form-ft clearfix">
                        <span class="tr">
                            <a href="/login">已有账号登录 &gt;</a>
                        </span>
                    </div>
            </form>
        </div>
    </div>
</div>
<script src="/home/static/js/find.js"></script>
<script>
    $(".demoform").Validform({
        tiptype:4
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //切换
    var status = 0;
    $('.J_ChangeRegType').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
        if(status == 0){
            $('.type-mobile').addClass('hide');
            $('.type-email').removeClass('hide');
            status = 1;
        }else{
            $('.type-mobile').removeClass('hide');
            $('.type-email').addClass('hide');
            status = 0;
        }
    });
    $('.mobile').blur(function(){
        var phone = $(this).val();
        if(phone == ''){
            return;
        }
        if(findphone(phone) == 0){
            $(".mobile").siblings('.Validform_right').remove();
            $("#username-error").remove();
            var label = $('<label id="username-error" class="error" for="username">此手机号未注册</label>');
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
        if(findemail(email) == 0){
            $(".email").siblings('.Validform_right').remove();
            $("#username-error").remove();
            var label = $('<label id="username-error" class="error" for="username">此邮箱未注册</label>');
            $('.email-group').append(label);
            bool = false;
        }
    });
    $('.email').focus(function(){
        $("#username-error").remove();
    });
    /*获取手机验证码*/
    $("#J_GetMobileReceiveCode").click(function(){
        //获取手机号
        var mobile = $('.mobile').val();
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
        if(findphone(mobile) == 0){
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
    /*获取邮箱验证码*/
    $("#J_GetEmailReceiveCode").click(function(){
        //获取邮箱
        var email = $('.email').val();
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
        if(findemail(email) == 0){
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
    $('.form-box').submit(function(){
        var password = $('.password').val();
        var repassword = $('.password-confirm').val();
        if(!password || !repassword){
            return false;
        }
        if(status == 0){
            var mobile = $('.mobile').val();
            var rand = $('.receive-code-mobile').val();
            if(!mobile || !rand){
                return false;
            }
            //发送ajax验证
            $.post('/doforget',{'phone':mobile,'password':password,'rand':rand},function(data){
                if(data == 1){
                    layer.msg("修改成功",{icon: 6,time:1000},function(){
                        location.href="/login";
                    });
                }else{
                    layer.msg(data,{icon: 5,time:1000});
                }
            })
        }
        if(status == 1){
            var email  = $('.email').val();
            var rand = $('.receive-code-email').val();
            if(!email || !rand){
                return false;
            }
            //发送ajax验证
            $.post('/doforget',{'email':email,'password':password,'rand':rand},function(data){
                if(data == 1){
                    layer.msg("修改成功",{icon: 6,time:1000},function(){
                        location.href="/login";
                    });
                }else{
                    layer.msg(data,{icon: 5,time:1000});
                }
            })
        }
        
        return false;
    })
</script>
<!--container end-->
@stop