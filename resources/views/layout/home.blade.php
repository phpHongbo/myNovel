<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta property="qc:admins" content="2554576230602773526375" />
    <meta name="baidu-site-verification" content="81BLZ1C2Te" />
    <meta name="shenma-site-verification" content="6ddf919e460df88fe12310e2097a23cc_1497866600" />
    <title>@yield('title')</title>
    <meta name="keywords" content="综漫小说，动漫小说，火影小说，海贼小说，动漫同人"/>
    <meta name="description" content="刺猬猫提供最新好看的全本二次元穿越，娘化百合，各种萌化后宫小说在线阅读，综漫小说，动漫小说，火影小说，海贼小说，动漫同人"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!--wap-->
	<meta name="mobile-agent" content="format=xhtml; url=https://wap.ciweimao.com">
	<meta name="mobile-agent" content="format=html5; url=https://wap.ciweimao.com">
	<link rel="shortcut icon" href="https://www.ciweimao.com/resources/image/icon/CiWeiMao_Icon_32_R.png">
   
    <link rel="stylesheet" type="text/css" href='/home/static/css/style.css'/>
    <!--<link rel="stylesheet" type="text/css" href=''/>-->
    <!--<link rel="stylesheet" type="text/css" href=''/>-->
        <!--<script type="text/javascript" language="javascript" src=''></script>-->
    <script type="text/javascript" language="javascript" src='/home/static/js/jquery.js'></script>
    <!--<script type="text/javascript" src=""></script>-->
    <!-- <script type="text/javascript" src="/home/static/js/base.js"></script> -->
    <!-- <script type="text/javascript" src="/home/static/js/dialog-min.js"></script> -->
    <link rel="stylesheet" href="/layui/css/layui.css">
    <script src="/layui/layui.js"></script>
    <script src="/layui/layui.start.js"></script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?1dbadbc80ffab52435c688db7b756e3a";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<body>
 <!-- 当前是章节阅读页 -->
 <!-- 当前是漫画阅读页 -->
<div id="bdstat" style="display: none"></div>

<div class="nav-top">
    <div class="ly-wrap">
        <a class="logo" href="https://www.ciweimao.com/" title="刺猬猫"></a>
        <ul class="login-info ly-fr">
        	                            <!--<li><a class="qq" href="" rel="nofollow"></a></li>-->
				<!--<li><a class="weixin" href="https://www.ciweimao.com/signup/weixin_login" rel="nofollow"></a></li> -->
            <li><a href="/login" rel="nofollow">登录</a></li>
            <li class="line">|</li>
            <li><a href="/register" rel="nofollow">注册</a></li>
                    </ul>
        <form class="search-form" action="" name="" method="post">
            <div class="input-group">
                <input name="keyword" autocomplete='off' type="text" autocomplete="off" x-webkit-speech="" data-type="1" x-webkit-grammar="builtin:translate" placeholder="搜索更多作品或作者" data-url="https://www.ciweimao.com/get-search-book-list/{key}"/>
                <button type="submit"></button>
            </div>
        </form>
    </div>
</div>

<!--  欢迎每日登录 领取推荐票 -->
<div class="dialogLoginBox" id="J_DialogLoginBox" style="display: none;">
    <div class="bd">
        <p>  你好~~</p>
        <p>送你 <b>
			0		</b> 张推荐票哦~</p>
        <p class="tips">登陆刺猬猫APP，<br/>完成每日签到任务，<br/>更有好礼相送。</p>
    </div>
    <div class="ft">
        <!--        <a class="btn-gettuijian" href="javascript:;" id="J_GetTJTicket">领取推荐票</a>-->
        <p class="auto-close"><i id="J_Timer">3</i>s后关闭</p>
    </div>
</div><div class="header">
    <div class="menu-wrap" id="J_MenuFixed">
        <div class="ly-wrap menu-inner">
            <ul class="menu-nav ly-fl clearfix">
                <li><a href="#/" class='selected' rel="nofollow">首页</a></li>
                <li><a href="#/rank-index" >排行</a></li>
        		<li><a href="#/book_list" >书库</a></li>
                <li><a href="#/index-comic" >漫画</a></li>
                <li><a href="#/index-game" >游戏</a></li>
                
                <li><a href="#/bbs"  >社区</a></li>
            </ul>
            <ul class="special ly-fr clearfix">
                <li class="p-tutelage"><a href="#/game/parents_tutelage" target="_blank" rel="nofollow">家长监护</a></li>
            	<li class="recharge"><a href="#/recharge/index" rel="nofollow"><i></i>充值中心</a></li>
            	<li class="author"><a href="#/reader/author" target="_blank" rel="nofollow"><i></i>作者后台</a></li>
            </ul>
        </div>
        <b></b>
    </div>
    </div>
<!-- 主内容 -->
@section('main')

@show
<div class="sidebar" id="J_AppDownloadSite">
	<a class="app-download" href="https://www.ciweimao.com/index/app" target="_blank">下载APP</a>
	<!--<a class="feedback" href="javascript:;">意见反馈</a>-->
</div>
<div class="friend-link">
        <div class="ly-wrap">
             <h3 class="tit">友情链接</h3>
            <ul>
                <li>
                    <a href="http://www.lenovomm.com" target="_blank">联想乐商店</a>
                </li>
                 <li>
                    <a href="http://www.dreamersall.com" target="_blank">梦想家中文网</a>
                </li>
                <li>
                    <a href="http://www.diyidan.com/" target="_blank" rel="nofollow">第一弹</a>
                </li>
                <li>
                    <a href="http://www.kuaikanmanhua.com" target="_blank">快看漫画</a>
                </li>
                <li>
                    <a href="http://www.iqing.in" target="_blank">轻文轻小说</a>
                </li>
    			<li>
                    <a href="https://www.9yread.com/" target="_blank">九阅小说</a>
                </li>
            </ul>
        </div>
</div><div class="footer">
    <div class="ly-wrap">
        <ul class="ly-fl about-us">
            <li>
                <dl>
                    <dt><a href="https://www.ciweimao.com/index">首页</a></dt>
                    <dd><a target="_blank" href="https://www.ciweimao.com/index/sitemap">网站地图</a></dd>
                    <dd><a target="_blank" href="https://www.ciweimao.com/index/about-us" rel="nofollow">关于刺猬猫</a></dd>
                </dl>
            </li>
            <li>
                <dl>
                    <dt>联系与合作</dt>
                    <dd><a target="_blank" href="https://www.ciweimao.com/index/contact-us" rel="nofollow">联系我们</a></dd>
                    <dd><a target="_blank" href="https://www.ciweimao.com/index/join-us" rel="nofollow">加入我们</a></dd>
                    <!-- <dd><a target="_blank" href="">帮助中心</a></dd> -->
                </dl>
            </li>
            <li>
                <dl>
                    <dt>移动客户端</dt>
                    <dd><a target="_blank" href="https://www.ciweimao.com/index/app/iphone" rel="nofollow">刺猬猫 iPhone 版</a></dd>
                    <dd><a target="_blank" href="https://www.ciweimao.com/index/app/android" rel="nofollow">刺猬猫 Android 版</a></dd>
                    <dd><a target="_blank" href="https://www.ciweimao.com/index/app/ipad" rel="nofollow">刺猬猫 iPad 版</a></dd>
                </dl>
            </li>
<!--             <li>
                <dl>
                    <dt>安全认证</dt>
                    <dd><a logo_size="83x30" logo_type="realname" href="http://www.anquan.org" ><script src="/home/static/js/aq_auth.js"></script></a></dd>
                </dl>
            </li> -->
        </ul>
        <div class="ly-fr follow-us">
            <div class="hd">关注我们</div>
            <div class="bd" id="J_QrCodeWx">
                小说资源互助群：274536193<br>
                刺猬猫问题反馈群：932751070<br>
                刺猬猫官方微信：<i><b></b></i>
            </div>
        </div>
    </div>
	<div class="copyright">
		Copyright &copy; 2015 Hangzhou Fantasy Technology NetworkCo.,Ltd.
	</div>
	<div class="record">
	  <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=33010802009271">
		 <p>杭州狂想网络科技有限公司&nbsp;&nbsp;</p><img src="/home/static/picture/record.png" style="float:left;"/>
		 <p>浙公网安备 33010802009271号</p><p>浙ICP备14025736号-3</p><p>浙网文[2018]3439-247</p>
	  </a>
        <p>请所有作者发布作品时务必遵守国家互联网信息管理办法规定，我们拒绝任何内容违法的小说，一经发现，即作删除！</p>
        <p>本站所收录作品、社区话题、书库评论及本站所做之广告均属个人行为，与本站立场无关</p>
   </div>
</div>
</body>
</html>