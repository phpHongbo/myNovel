/*
 * HB.util.require
 * 
 * HB.util.require [url,params,callback(a,b),true]
 *
 */
(function($, undefined) {
	var HB = window.HB || {};
	HB.util = HB.util || {};
	HB.config = HB.config || {};
	HB.config.jsAlias = HB.config.jsAlias || {};

	//调试加载未压缩文件
	HB.debug = HB.config.debug ? HB.config.debug : false;
	HB.jsVer = HB.config.jsVer ? HB.config.jsVer : '';
	if (HB.debug) {
		HB.extend = '.js';
	} else {
		HB.extend = '-min.js';
	}

	//后缀
	if (HB.jsVer) {
		HB.extend += HB.jsVer;
	}

	//合并HB.config.jsAlias
	$.extend(HB.config.jsAlias,{
		"jquery.lazyload": HB.config.jsPath + '/jquery-plugins' + "/jquery.lazyload/jquery.lazyload-1.9.3.min.js",
		"jquery.cookie": HB.config.jsPath + '/jquery-plugins' + "/jquery.cookie/jquery.cookie-1.4.1.min.js",
		"jquery.mCustomScrollbar": HB.config.jsPath + '/jquery-plugins' + "/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js",
		"jquery.nicescroll": HB.config.jsPath + '/jquery-plugins' + "/jquery.nicescroll/3.6.6/jquery.nicescroll.min.js"
	});

	//元素类型判断函数
	$.extend(HB.util, {
		isArray: Array.isArray || isType("Array"),
		isString: isType("String"),
		isObject: isType("Object"),
		isFunction: isType("Function")
	});

	function isType(type) {
		return function(obj) {
			return Object.prototype.toString.call(obj) === "[object " + type + "]"
		}
	}

	//@Todo 加载多文件
	HB.util.require = HB.util.require || function() {
		var args = arguments,len = args.length,lag = (args[len-1] == true);

		var path = HB.config ? HB.config.js : '../../js';

		if ($.fn['HB' + args[0]]) return;

		//判断是否在HB.config.jsAlias 直接加载,调用回调函数
		if (HB.config.jsAlias && HB.config.jsAlias[args[0]] != undefined) {
			
			var url = HB.config.jsAlias[args[0]] + HB.jsVer;
			
		} else {

			if (lag) { //最后一个参数为true时，为js 否则用自定义路径
			var url = + '/' + args[0] + HB.extend;
			} else {
			var url = args[0] + HB.extend;
			}

		}

		//回调函数
		if (HB.util.isArray(args[1])) {
			 var params = args[1];
			 var callback = args[2];
		} else if (HB.util.isFunction(args[1])) {
			 var callback = args[1];
		}

		//加载文件
		var script = document.createElement('script');
		var head = document.getElementsByTagName("head")[0];
		script.type = 'text/javascript';
		script.charset = 'utf-8';
		script.async = true;
		if (script.readyState) { //IE
			script.onreadystatechange = function() {
			if (script.readyState == "loaded" || script.readyState == "complete") {
				script.onreadystatechange = null;

				if (callback) {
				if (params)
					callback.apply(this, params);
				else
					callback();
				}

				if (! HB.debug) head.removeChild(script);
			}
			};
		} else { //Others
			script.onload = function() {

			if (callback) {
				if (params)
				callback.apply(this, params);
				else
				callback();
			}

			if (! HB.debug) head.removeChild(script);
			}
		}

		script.src = url;
		
		head.appendChild(script);
	};


	HB.util.Cookie = {
	    getExpiresDate:function(days, hours, minutes) {
	        var ExpiresDate = new Date();
	        if (typeof days == "number" && typeof hours == "number" &&
	            typeof hours == "number") {
	            ExpiresDate.setDate(ExpiresDate.getDate() + parseInt(days));
	            ExpiresDate.setHours(ExpiresDate.getHours() + parseInt(hours));
	            ExpiresDate.setMinutes(ExpiresDate.getMinutes() + parseInt(minutes));
	            return ExpiresDate.toGMTString();
	        }
	    },
	    _getValue:function(offset) {
	        var endstr = document.cookie.indexOf (";", offset);
	        if (endstr == -1) {
	            endstr = document.cookie.length;
	        }
	        return unescape(document.cookie.substring(offset, endstr));
	    },
	    get:function(name) {
	        var arg = name + "=";
	        var alen = arg.length;
	        var clen = document.cookie.length;
	        var i = 0;
	        while (i < clen) {
	            var j = i + alen;
	            if (document.cookie.substring(i, j) == arg) {
	                return this._getValue(j);
	            }
	            i = document.cookie.indexOf(" ", i) + 1;
	            if (i == 0) break;
	        }
	        return "";
	    },
	    set:function(name, value, c) {
	        if ("undefined" != typeof value) {
	            c = c || {},
	            null  === value && (value = "", c.expires = -1);
	            var d = "";
	            if (c.expires && ("number" == typeof c.expires || c.expires.toUTCString)) {
	                var e;
	                "number" == typeof c.expires ? (e = new Date,
	                e.setTime(e.getTime() + 86400 * c.expires * 1e3)) : e = c.expires,
	                d = "; expires=" + e.toUTCString()
	            }
	            var f = c.path ? "; path=" + c.path : ""
	              , g = c.domain ? "; domain=" + c.domain : ""
	              , h = c.secure ? "; secure" : "";
	              // console.log([name, "=", encodeURIComponent(value), d, f, g, h].join(""))
	            document.cookie = [name, "=", encodeURIComponent(value), d, f, g, h].join("")
	        }
	    },
	    remove:function(name,path,domain) {
	        if (this.get(name)) {
	            document.cookie = name + "=" +
	                ((path) ? "; path=" + path : "") +
	                ((domain) ? "; domain=" + domain : "") +
	                "; expires=Thu, 01-Jan-70 00:00:01 GMT";
	        }
	    },
	    clear:function(){
	        var cookies = document.cookie.split(';');
	        for(var i=0; i < cookies.length; i++)
	            var cookieName = cookies[i].split('=')[0];
	            if(cookieName=='ProductListIds')
	            {
	                this.remove(cookieName);
	            }
	    }
	};

	//用户信息
	HB.user = HB.user || {};
	HB.user.user_id = HB.util.Cookie.get("user_id");

	//登录弹框
	HB.util.loginDialog = function() {
		var agentname ="Baiduspider";
		if(navigator.userAgent.toLowerCase().indexOf(agentname.toLowerCase()) !=-1) {
			return;
		}
		HB.util.loadGeetest();
		var elem = document.getElementById('J_LoginBox');
		var d = dialog({
			title: '登录',
			fixed: true,
			skin: 'dialog-login',
			content: elem
		});
		$("#code").trigger('click');
		d.showModal();
	};
	
	//验证码弹框
	HB.util.loginDialogCode = function() {
		var elem = document.getElementById('J_LoginBox_Code');
		var d = dialog({
	        title:' ',
	        fixed: true,
	        content: elem
	    });
        $("#code").trigger('click');
		d.showModal();
	};
	// var i = 0;
	//提示框
	HB.util.alert = function (msg, sec) {
		var cnt = '<div class="dialog-tip">'+msg+'</div>';
		var opt = {title: ' ', fixed: true, content: cnt,skin: 'dialog-alert'};
		var d = new dialog(opt).showModal();
		if (sec) {
			setTimeout(function () {
				d.close().remove();
			}, sec*1000);
		}
	};
	//用户实名认证提醒
	HB.util.identifyDialog = function(url) {
		var html_d = '<div class="dialog-identify">' +
		'<p class="msg">根据《移动互联网程序信息管理规定》，<br/>我们需要通过手机号码<br/>对您的真实身份进行认证</p>' +
		'<p class="tips">前往验证手机号码，会离开当前页面，请保存好需要的信息。</p>' +
		'</div>';
		var d = dialog({
			title:'实名认证',
			fixed: true,
			content: html_d,
			button: [
				{
					value: '去验证',
					callback: function () {
						window.location.href = url;
					},
					autofocus: true
				},
				{
					value: '取消'
				}
			]
		});
		d.showModal();
	};

	//字符串截取
    HB.util.cut_str = function(str, len, hasDot, c){
	    var newLength=0;
	    var newStr="";
	    var chineseRegex=/[^\x00-\xff]/g;
	    var singleChar='';
	    var strLength=str.replace(chineseRegex,'**').length;
	    for(var i=0;i < strLength;i++){
	    singleChar=str.charAt(i).toString();
	    if(singleChar.match(chineseRegex) != null){
	    	if (c) {
		        newLength+=2;
	    	} else {
		        newLength++;//字符
	    	}
	    }else{
	        newLength++;
	    }
	    if(newLength>len){
	        break;
	    }
	    newStr+=singleChar;
	    }
	    if(hasDot && strLength>len){
	        newStr+='...';
	    }
	    return newStr;
	}

})(jQuery);


if (typeof String.prototype.trim === "undefined") {
    String.prototype.trim = function() {
        return String(this).replace(/^\s+|\s+$/g, '');
    };
}



//修复IE在未F12开启调试工具的时候，console未定义的BUG
window.console = window.console || (function(){
	var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile
	= c.clear = c.exception = c.trace = c.assert = function(){};
	return c;
})();


/*
 * $.fn.hoverClass
 * $x.hoverClass("className") //默认为hover
 */
(function(a) {
	a.fn.hoverClass = function(b) {
	var a = this;
	b = b ? b : 'hover';
	a.each(function(c) {
		a.eq(c).hover(function() {
		$(this).addClass(b)
		}, function() {
		$(this).removeClass(b)
		})
	});
	return a
	};
})(jQuery);


jQuery.ajaxSetup({
	type: 'POST',
	dataType: 'json',
	cache: false,
    error: function(XMLHttpRequest, textStatus, errorThrown) {
    	HB.util.alert('网络错误，请稍后重试！', 5);
    }
});

//网站主要功能
(function($,HB){

	$.extend(HB.config.jsAlias,{
		"carousel": HB.config.jsPath + '/third-parties/' + "carousel.js",
		"slider": HB.config.jsPath + '/third-parties/' + "slider.js",
		"autocomplete": HB.config.jsPath + '/third-parties/' + "autocomplete.js",
		"tab": HB.config.jsPath + '/third-parties/' + "tab.js",
		"placeholder": HB.config.jsPath + '/third-parties/' + "placeholder.js"
	});

	$(function(){

		if (typeof initResponse == 'function')
	  		window.onresize = initResponse;
		
		//宅文推荐轮播
		$('#carousel').length && carouselHandle($('#carousel'));
		//幻灯片
		$('.J_Slider').length && sliderHandle($('.J_Slider'));
		//图片延时加载
		$('img.lazyload').length && lazyloadHandle();
		//placeholder
		$('input[placeholder]').length && placeholder($('input[placeholder]'));
		//自动补全
		$("input[name='keyword'][autocomplete='off']").length && autocompleteHandle($("input[name='keyword'][autocomplete='off']"));
		//切换
		$('.act-tab').length && tabSwitch($('.act-tab'));
		$('.act-tab-hover').length && tabSwitch($('.act-tab-hover'),{'handle':'mouseover'});

		$('.J_SimpleScroll').length && simpleScrollHandle($('.J_SimpleScroll'));
		// $('.J_mCustomScrollbar').length && mCustomScrollbar($('.J_mCustomScrollbar'));
		$('.J_mCustomScrollbar').length && nicescroll($('.J_mCustomScrollbar'));
	});
	
	function carouselHandle(obj) {
		HB.util.require('carousel', function(){
			$('.slides', obj).show();
			obj.carousel({
				hAlign: 'center',
				hMargin: 0.5,
				frontWidth: 180,
				frontHeight: 240,
				carouselWidth: 180,
				carouselHeight: 240,
				directionNav: true,
				buttonNav: 'bullets',
				autoplay: true,
				autoplayInterval: 3000,
				pauseOnHover: true,
				shadow: true,
				description: true,
				descriptionContainer: '.description'
			});
		},true);
	}

	function sliderHandle(obj){
		HB.util.require('slider', function(){
			obj.each(function(){
				if ($(this).attr('data-type') == 'ads') {
					$(this).qfcslider({'speed':6000, 'style': 'scroll','direction': 'vertical'});
				} else if ($(this).attr('data-style') == 'filter') {
					$(this).qfcslider({
						style: 'filter',
						duration: 300,
						goBtn: true,
						pageNum: false,
						pageBtn: { action: 'mouseover' },
						pageOptions: {
							background_ele: $("#J_Banner"),
							background: true
						}
					});
				}
				else {
					$(this).qfcslider({
						'goBtn':true,
						'pageNum':false,
						'style': 'scroll'
					});
				}

			});
		},true);
	}

	function lazyloadHandle() {
		HB.util.require('jquery.lazyload', function(){
			 $("img.lazyload").lazyload({
				threshold : 300,
				// effect : "fadeIn",
				// placeholder: "../images/transparent.png",
				failure_limit: 200,
				skip_invisible : false
			});
		});
	}
	function placeholder(obj){
		HB.util.require('placeholder', function(){
			obj.each(function(){
			$(this).qfcplaceholder();
			});
		});
	}
	
	function autocompleteHandle (obj) {
		HB.util.require('autocomplete', function(){
			obj.each(function(){
			$(this).qfcac({
                width:338,
                url: HB.config.rootPath + 'index/get_search_keys',
                submitMode: false,
                left: 0
                });
			});
		});
	}
	function mCustomScrollbar (obj) {
		HB.util.require('jquery.mCustomScrollbar', function(){
			obj.each(function() {
				var option = $.extend({
					theme:'dark'
				}, $(this).data(option));
				$(this).mCustomScrollbar(option);
			});
		});
	}
	function nicescroll (obj) {
		HB.util.require('jquery.nicescroll', function(){
			obj.each(function() {
				var option = $.extend({
					cursorcolor: '#c8c8c8'
				}, $(this).data(option));
				$(this).niceScroll(option);
			});
		});
	}

	function tabSwitch(obj,opt){
		HB.util.require('tab', function(){
			obj.qfctab(opt?opt:{});
		});
	}

	//文字滚动
	function simpleScrollHandle(obj) {
		obj.each(function(){
			var _this = $(this);
			var len = $(this).find("li").length;
			var dataLen = _this.attr('data-length');
			
			if (len <= dataLen) return;

			var H = _this.find("li").first().outerHeight();

			var t = setInterval(function(){scroll(_this, H)}, 4000);

			_this.mouseenter(function(){
				clearInterval(t);
			}).mouseleave(function(){
				t = setInterval(function(){scroll(_this, H)}, 4000);
			});

		});

		function scroll(o,H) {
			o.animate({
			marginTop : '-'+H+'px'
			},500,function() {
				$('.J_SimpleScroll').css({marginTop : 0}).children("li:first").appendTo(this);
			});
		}
	}
        // 跳出阅读页iframe
	var url = window.location.href;
	var chapterIframe = $("iframe#chapter", top.document);
	if (chapterIframe.length && (url.indexOf("chapter") == -1)) {
		top.window.location.href = url;
	}

})(jQuery,HB);

//时间
//author: meizz 
//var time1 = new Date().Format("yyyy-MM-dd");
//var time2 = new Date().Format("yyyy-MM-dd HH:mm:ss"); 
Date.prototype.Format = function (fmt) { 
    var o = {
        "M+": this.getMonth() + 1, //月份 
        "d+": this.getDate(), //日 
        "h+": this.getHours(), //小时 
        "m+": this.getMinutes(), //分 
        "s+": this.getSeconds(), //秒 
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
        "S": this.getMilliseconds() //毫秒 
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
    if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}

$(function(){
    // 搜索框位置
    function searchFormPosition () {
        if($('#J_MenuFixed').length) {
            var windowW = $(window).width(),
                wrapperW = $('.ly-wrap').width(),
                distance = windowW - wrapperW,
                left = 390;
            if (distance >= 0) {
                $('.nav-top .search-form').css({position: 'fixed', left: distance / 2 + left + 'px', 'z-index': 1024});
            } else {
                $('.nav-top .search-form').css({position: 'fixed', left: left + 'px', 'z-index': 1024});
            }
        }
    }

    searchFormPosition();
	if($('#J_MenuFixed').length) {
		var menuFixedPosition = $("#J_MenuFixed").position();
        var menuFixed = parseInt(menuFixedPosition.top);
	}

	$(window).scroll(function() {
		//返回顶部
		if ($('#J_GoTop').length) {
			if($(this).scrollTop()>300){
				$('#J_GoTop').fadeIn(400);
			} else {
				$('#J_GoTop').fadeOut(600);
			}
		}
		//头部导航是否固定
		if($('#J_MenuFixed').length) {
			if($(this).scrollTop() >= menuFixed){
				$('#J_MenuFixed').addClass("menu-fixed");
			} else {
				$('#J_MenuFixed').removeClass("menu-fixed");
			}
		}

	});
	$("#J_GoTop").hide().click(function(){
		$('html,body').animate({scrollTop:0},'slow');
		return false;
	});
    $(window).resize(function () {
        searchFormPosition();
    });

	//推荐专区
	$("#J_Topic li>a").hoverClass();
	//小说详情
	$(".book-list .img").hoverClass();
	//头部二维码
	$("#J_QrCode").hover(function() {
		var $div = $('div', this);
		$div.stop().animate({height: '120px'});
		// $div.stop().animate({height: $div.height()+'px'});
	}, function() {
		$('div', this).stop().animate({height:0});
	});
	//app
	$(".J_QrCode").hover(function() {
		var $div = $('div', this);
		$div.stop().animate({height: '120px'});
		// $div.stop().animate({height: $div.height()+'px'});
	}, function() {
		$('div', this).stop().animate({height:0});
	});
	//$("#J_QrCodeWx").hover(function() {
	//	$('div', this).show();
	//}, function () {
//		$('div', this).hide();
//	});


	//粉丝弹框
	$(".J_FansTip li").hoverClass();

	//input-radio
	$(document).on('click', '.J_InputRadio a', function() {
		var self = $(this);
		var box = self.closest('.J_InputRadio');
		if (self.hasClass("selected")) return;
		box.find("a").removeClass("selected").find("input[type='radio']").attr('checked', false);
		self.addClass("selected").find("input[type='radio']").attr('checked', true);
	});

	//input-checkbox
	$(document).on('click', '.J_InputCheckbox a', function() {
		var self = $(this);
		if (self.hasClass("selected")){
			self.removeClass("selected").find("input[type='checkbox']").attr('checked', false);
		}else{
			self.addClass("selected").find("input[type='checkbox']").attr('checked', true);
		}
	});


	//排行榜
	//$(".J_RankList").hover(function() {
	//	var $box = $(this).closest(".J_RankList");
	//	$box.find('ul').show();
	//}, function() {
	//	var $box = $(this).closest(".J_RankList");
	//	$box.find('ul').hide();
	//});
	$(".J_RankList a").click(function() {
		var self = $(this),
			li = self.parent(),
			rank_list = self.closest(".J_RankList"),
			recommend_box = rank_list.closest(".J_RecommendBox");
		if (li.hasClass("selected")) return;
		var index = li.index();
		rank_list.find("li").removeClass("selected");
		li.addClass("selected");
		$(recommend_box.find('.tab').get(index)).show().siblings(".tab").hide();
	});

	//数量加减
	$(document).on("click", ".J_GiveGift .J_noMinus", function() {
		var parent = $(this).closest('.J_GiveGift');
		var input = parent.find(".J_NumResult");

		if (input.val()>1) {
			input.val(parseInt(input.val())-1);
		}
	});
	$(document).on("click", ".J_GiveGift .J_noPlus", function() {

		var self = $(this);
		var parent = $(this).closest('.J_GiveGift');
		var input = parent.find(".J_NumResult");

        //var stock = parseInt(parent.find(".J_Stock").text());
        var stock = parent.find(".J_Stock");//月票
        if(stock.length==0)
            stock = parent.find(".J_Recommend");//推荐票
        stock = parseInt(stock.text());
        stock = isNaN(stock) ? 0 : stock;

		if (input.val()<stock) {
			input.val(parseInt(input.val())+1);
		} else {
			input.val(stock);
		}
	});
	//$(".J_GiveGift").find(".J_NumResult").keyup(function() {
	$(document).on("keyup", ".J_GiveGift .J_NumResult", function() {
    	var value = $(this).val();
		$(this).val(value.replace(/[^\d]/g,''));
	});
	//道具数量加减
	(function(){
		var ownBlade = parseInt($(".J_AccountProp .J_OwnBlade").text()),
			input = parseInt($(".J_AccountProp .J_NumResult").val());
		if(ownBlade >= input){
			$(".J_AccountProp .J_BladeNum").text(0);
			$(".J_AccountProp .J_Consume").text(0);
		}
	})();
	$(document).on("click", ".J_AccountProp .J_BladeAmount a", function() {
		var parent = $(this).closest('.J_AccountProp'),
			input = parent.find(".J_NumResult"),
			consume = parent.find(".J_Consume"),
			bladePrice = parseInt(parent.find(".J_BladePrice").text()),
			ownBlade = parseInt(parent.find(".J_OwnBlade").text()),
			bladeNum = parent.find(".J_BladeNum"),
			val = parseInt(input.val());
		val = isNaN(val) ? 0 : val;
		if($(this).hasClass("J_noPlus")){
			if (val >= (Math.round( Math.pow(10,10) ) - 1)) {
				return false;
			}
			input.val(val+1);
			if(ownBlade >= input.val()){
				bladeNum.text(0);
			}else{
				bladeNum.text(val+1-ownBlade);
			}
			consume.text(parseInt( bladeNum.text() ) * bladePrice);
		}else if($(this).hasClass("J_noMinus")){
			if (val>1) {
				input.val(val-1);
				if(ownBlade >= input.val()){
					bladeNum.text(0);
				}else{
					bladeNum.text(val-1-ownBlade);
				}
				consume.text(parseInt( bladeNum.text() ) * bladePrice);
			}
		}
	});
	$(document).on("keyup", ".J_AccountProp .J_NumResult", function() {
		var value = $(this).val();
		$(this).val(value.replace(/[^\d]/g,''));
		var parent = $(this).closest('.J_AccountProp'),
			consume = parent.find(".J_Consume"),
			bladePrice = parseInt(parent.find(".J_BladePrice").text()),
			ownBlade = parseInt(parent.find(".J_OwnBlade").text()),
			bladeNum = parent.find(".J_BladeNum"),
			val = parseInt($(this).val());
		val = isNaN(val) ? 0 : val;
		if(ownBlade >= val){
			bladeNum.text(0);
		}else{
			bladeNum.text(val-ownBlade);
		}
		consume.text(parseInt( bladeNum.text() ) * bladePrice);
	});
        
	//数量加减
	$(document).on("click", ".J_NumCalculate .no-minus, .J_NumCalculate .no-plus", function () {
		var parent = $(this).closest('.J_NumCalculate'),
			input = parent.find(".J_NumResult"),
			val = parseInt(input.val());
		val = isNaN(val) ? 0 : val;
		if( $(this).hasClass("J_noPlus") ){
			if (val >= (Math.round( Math.pow(10,10) ) - 1)) {
				return false;
			}
			input.val(val + 1);
		}else if($(this).hasClass("J_noMinus")){
			if (val > 1) {
				input.val(val-1);
			}
		}
	});
	$(document).on("keyup", ".J_NumCalculate .J_NumResult", function() {
		var val = $(this).val();
		$(this).val(val.replace(/[^\d]/g,''));
	});
	//评论 赞黑
	function commentOpt(type, id, self, sibling) {
		if (self.attr("disabled")) return;

		var url = {
			zanTsukkomi: 	'chapter/like_tsukkomi',
			heiTsukkomi: 	'chapter/unlike_tsukkomi',
			zanReview: 		'book/like_review',
			heiReview: 		'book/unlike_review',
			zanBbs:			'bbs/like_bbs',
			heiBbs:			'bbs/unlike_bbs',
			zanBbsComment:	'bbs/like_bbs_comment',
			heiBbsComment:	'bbs/unlike_bbs_comment'
		};
		var data = {};
		data.csrf_token = HB.util.Cookie.get('login_token');
		if (type == 'zanTsukkomi' || type == 'heiTsukkomi') {
			data.tsukkomi_id = id;
		} else if (type == 'zanReview' || type == 'heiReview') {
			data.review_id = id;
		}else if (type == 'zanBbs' || type == 'heiBbs') {
			data.bbs_id = id;
		}else if (type == 'zanBbsComment' || type == 'heiBbsComment') {
			data.comment_id = id;
		} else {
			return false;
		}
		
		if (self.hasClass('done')) {
			data.doaction = 'done';
			$.ajax({
				url: HB.config.rootPath + url[type],
				data: data,
				beforeSend: function() {
					self.attr("disabled", true);
				},
				complete: function() {
					self.attr("disabled", false);
				},
				//error: function() {
				//	var res = {};
				//	res.code = 100000;
				//	res.tip = 100000;
				//	if (res.code == 100000) {
				//		self.removeClass("done");
				//		var num = parseInt(self.find('i').text()) - 1;
				//		if (num == 0) {
				//			self.removeClass("num");
				//			if (self.hasClass("zan")) {
				//				self.html("点赞");
				//			} else {
				//				self.html("点黑");
				//			}
				//		} else {
				//			self.find('i').text(num);
				//		}
				//	} else {
				//		HB.util.alert(res.tip);
				//	}
				//},
				success: function(res) {
					if (res.code == 100000) {
						self.removeClass("done");
						var num = parseInt(self.find('i').text()) - 1;
						if (num == 0) {
							self.removeClass("num");
							if (self.hasClass("zan")) {
								self.html("点赞");
							} else {
								self.html(" 点黑");
							}
						} else {
							self.find('i').text(num);
						}
					}
					else {
						HB.util.alert(res.tip);
					}
				}
			});
		} else {
			$.ajax({
				url: HB.config.rootPath + url[type],
				data: data,
				beforeSend: function() {
					self.attr("disabled", true);
				},
				complete: function() {
					self.attr("disabled", false);
				},
				//error: function() {
				//	var res = {};
				//	res.code = 100000;
				//	res.tip = 100000;
				//	if (res.code == 100000) {
				//		self.addClass("done");
				//		if (self.hasClass('num')) {
				//			self.find('i').text(1 + parseInt(self.find('i').text()));
				//		} else {
				//			self.addClass("num").html("<i>1</i>");
				//		}
                //
				//		if (sibling.hasClass('done')) {
				//			sibling.removeClass('done');
				//			var num = parseInt(sibling.find('i').text())-1;
				//			if (num == 0) {
				//				sibling.removeClass("num");
				//				if (sibling.hasClass("zan")) {
				//					sibling.html("点赞");
				//				} else {
				//					sibling.html("点黑");
				//				}
				//			} else {
				//				sibling.find('i').text(num);
				//			}
				//		}
				//	} else {
				//		HB.util.alert(res.tip);
				//	}
				//},
				success: function(res) {
					if (res.code == 100000) {

						self.addClass("done");
						if (self.hasClass('num')) {
							self.find('i').text(1+parseInt(self.find('i').text()));
						} else {
							self.addClass("num").html("<i>1</i>");
						}

						if (sibling.hasClass('done')) {
							sibling.removeClass('done');
							var num = parseInt(sibling.find('i').text())-1;
							if (num == 0) {
								sibling.removeClass("num");
								if (sibling.hasClass("zan")) {
									sibling.html("点赞");
								} else {
									sibling.html("点黑");
								}
							} else {
								sibling.find('i').text(num);
							}
						}
					} else {
						HB.util.alert(res.tip);
					}
				}
			});
		}
	}

	$(document).on("click", ".J_TsukkomiOpt .J_Zan", function() {
        if (HB.userinfo.reader_id==0) {
            HB.util.loginDialog();
            return;
        }
        var self = $(this);
		var parent = self.closest(".J_TsukkomiOpt");
		var sibling = parent.find(".J_Hei");
		var id = self.closest("li").attr('data-tsukkomi-id');

		commentOpt('zanTsukkomi', id, self, sibling);
	});
	$(document).on("click", ".J_TsukkomiOpt .J_Hei", function() {
        if (HB.userinfo.reader_id==0) {
            HB.util.loginDialog();
            return;
        }
        var self = $(this);
		var parent = self.closest(".J_TsukkomiOpt");
		var sibling = parent.find(".J_Zan");
		var id = self.closest("li").attr('data-tsukkomi-id');

		commentOpt('heiTsukkomi', id, self, sibling);
	});
	$(document).on("click", ".J_CommentOpt .J_Zan", function() {
        if (HB.userinfo.reader_id==0) {
            HB.util.loginDialog();
            return;
        }
        var self = $(this);
		var parent = self.closest(".J_CommentOpt");
		var sibling = parent.find(".J_Hei");
		var id = self.closest("li").attr('data-review-id');

		commentOpt('zanReview', id, self, sibling);
	});
	$(document).on("click", ".J_CommentOpt .J_Hei", function() {
        if (HB.userinfo.reader_id==0) {
            HB.util.loginDialog();
            return;
        }
        var self = $(this);
		var parent = self.closest(".J_CommentOpt");
		var sibling = parent.find(".J_Zan");
		var id = self.closest("li").attr('data-review-id');

		commentOpt('heiReview', id, self, sibling);
	});

	//论坛赞/黑
	$(document).on("click", ".J_bbsOpt .J_Zan", function() {
		if (HB.userinfo.reader_id==0) {
			HB.util.loginDialog();
			return;
		}
		var self = $(this);
		var parent = self.closest(".J_bbsOpt");
		var sibling = parent.find(".J_Hei");
		var id = self.closest("li").attr('data-bbs-id');

		commentOpt('zanBbs', id, self, sibling);
	});
	$(document).on("click", ".J_bbsOpt .J_Hei", function() {
		if (HB.userinfo.reader_id==0) {
			HB.util.loginDialog();
			return;
		}
		var self = $(this);
		var parent = self.closest(".J_bbsOpt");
		var sibling = parent.find(".J_Zan");
		var id = self.closest("li").attr('data-bbs-id');

		commentOpt('heiBbs', id, self, sibling);
	});

	//论坛评论的赞/黑
	$(document).on("click", ".J_bbsCommentOpt .J_Zan", function() {
		if (HB.userinfo.reader_id==0) {
			HB.util.loginDialog();
			return;
		}
		var self = $(this);
		var parent = self.closest(".J_bbsCommentOpt");
		var sibling = parent.find(".J_Hei");
		var id = self.closest("li").attr('data-comment-id');

		commentOpt('zanBbsComment', id, self, sibling);
	});
	$(document).on("click", ".J_bbsCommentOpt .J_Hei", function() {
		if (HB.userinfo.reader_id==0) {
			HB.util.loginDialog();
			return;
		}
		var self = $(this);
		var parent = self.closest(".J_bbsCommentOpt");
		var sibling = parent.find(".J_Zan");
		var id = self.closest("li").attr('data-comment-id');

		commentOpt('heiBbsComment', id, self, sibling);
	});

	//关注、取消关注
	$(document).on("click", ".J_Follow", function() {
        if (HB.userinfo.reader_id==0) {
            HB.util.loginDialog();
            return;
        }
        var self = $(this);
        if (self.prop("disabled")) return false;

        var curr_reader_id = self.attr('data-reader-id');
        var csrf_token = HB.util.Cookie.get('login_token');
        console.log

        //取消关注
        if (self.attr("data-follow")==1) {
            $.ajax({
                url: HB.config.rootPath + 'reader/unfollow',
                data: {
                	reader_id:curr_reader_id,
                    csrf_token:csrf_token
				},

                beforeSubmit: function() {
                    self.prop("disabled", true);
                },
                complete: function () {
                    self.prop("disabled", false);
                },
                // error: function () {
                // 	var res = {};
                // 	res.code = 100000;
                //     if (res.code == 100000) {
                //         var msg = res.tip ? res.tip : '取消关注成功！';
                //         HB.util.alert(msg,1);
                //         self.attr("data-follow", 0);
                //     	self.html("<i>&plus;</i> 关注");
                //     } else {
                //         HB.util.alert(res.tip,1);
                //     }
                // },
                success: function (res) {
                    if (res.code == 100000) {
                        var msg = res.tip ? res.tip : '取消关注成功！';
                        HB.util.alert(msg,1);
                        //self.attr("data-follow", 0);
                        //self.html("<i>&plus;</i> 关注");
			            syncFollow(curr_reader_id, "<i>&plus;</i> 关注", 0);
                    } else {
                        HB.util.alert(res.tip,1);
                    }
                }
            });
        } else { //关注

            $.ajax({
                url: HB.config.rootPath + 'reader/follow',
                data: {
                    reader_id:curr_reader_id,
                    csrf_token:csrf_token
                },

                beforeSubmit: function() {
                    self.prop("disabled", true);
                },
                complete: function () {
                    self.prop("disabled", false);
                },
                success: function (res) {
                    if (res.code == 100000) {
                        var msg = res.tip ? res.tip : '关注成功！';
                        HB.util.alert(msg,1);
                        //self.attr("data-follow", 1);
                        //self.html("<i>&times;</i> 取消关注");
			            syncFollow(curr_reader_id, "<i>&times;</i> 取消关注", 1);
                    } else {
                        HB.util.alert(res.tip,1);
                    }
                }
            });
        }

        function syncFollow(id, html, follow_type) {
        	$(document).find(".J_Follow[data-reader-id='"+id+"']").html(html).attr("data-follow", follow_type);
        }
	});
	
	//选择禁言天数
	$(document).on("click", "#J_SelectTime", function () {
		if ($(this).hasClass("open")) {
			$(this).removeClass("open");
			$("#J_TimeList").hide();
		} else {
			$(this).addClass("open");
			$("#J_TimeList").show();
		}
	});
	$(document).on("click", "#J_TimeList li", function () {
		var time = $(this).text(),
			ind = $(this).attr("data-value");
		$("#J_SelectTime").text(time).attr("data-time", ind).removeClass("open");
		$(this).parent().hide();
	});
	
	//分页跳转
	$(document).on('click', '.pageSkipQd', function(event) {
    	var url = $('#curr_url').val();
    	if ($('#curr_url').length) {
			var $page = $(this).closest('li.pageSkip');
			var total = parseInt($page.find('i').text());
			var $input = $page.find('input');
			var input = parseInt($input.val());
			if (isNaN(input)) {
				return false;
			}
			if (input < 1) {
				input = 1;
				$input.val(input);
			}
			if (input > total) {
				input = total;
				$input.val(input);
			}
			
            //书评翻页
            if (url.indexOf("change_review_page") != '-1') {
                change_review_page(input);
            }else if (url.indexOf("change_comment_page") != '-1'){
				change_comment_page(input);
			}
            else {
				if(url.indexOf("bbs") != '-1'){
					if (input>=20) {
						HB.util.loginDialogCode();
						return;
					}
				}
                url += '/' + input;
                window.location.href = url;
            }
    	}
	});


	//每天领取推荐票
	function GetDateStr(AddDayCount) {
		var d_day = new Date();
		d_day.setDate(d_day.getDate() + AddDayCount);//获取AddDayCount天后的日期
		var y = d_day.getFullYear(),
			m = d_day.getMonth() + 1,//获取当前月份的日期
			d = d_day.getDate();
		return (y + "-" + m + "-" + d);
	}
	(function  () {
        if (!(typeof(HB.userinfo) == "undefined") && HB.userinfo.reader_id!=0) {
			if(HB.activity&&HB.activity.activity_id==5){//年终盘点活动
				if (HB.util.Cookie.get('get_task_type_sign') !== '1') {
					$.ajax({
						url: HB.config.rootPath + 'reader/get_daily_task_bonus',
						data: {task_type:11},
						success: function (res) {
							if (res.code == 100000) {
								HB.util.Cookie.set('get_task_type_sign', 1, {
									domain: document.domain,
									path: "/",
									expires: new Date(GetDateStr(1))
								});
								// window.location.reload();
							} else if (res.code == 340003) {
								HB.util.Cookie.set('get_task_type_sign', 1, {
									domain: document.domain,
									path: "/",
									expires: new Date(GetDateStr(1))
								});
							} else {
								// HB.util.alert(res.tip,1);
							}
						}
					});
				}
			}
			var elem = document.getElementById('J_DialogLoginBox');
            if (elem == null) return;
			var d = dialog({
				title: '欢迎每日登录',
				width: 350,
				fixed: true,
                                skin: 'dialog-box dialog-login-tips',
				content: elem
			});
            //显示弹框
            if (HB.util.Cookie.get('get_task_type_sign') !== '1') {
				get_daily_task_bonus();
            }
        }
		
		function get_daily_task_bonus(){
            $.ajax({
		        url: HB.config.rootPath + 'reader/get_daily_task_bonus',
		        data: {task_type:11},
		        success: function (res) {
		            if (res.code == 100000) {
						//倒计时
						d.showModal();
						var times = parseInt($("#J_Timer").text()),
							timer = setInterval(function(){
								$("#J_Timer").text(times--);
								if(times < 0){
									clearInterval(timer);
									d.close();
								}
							},1000);
		                $(".J_Stock").text(res.data.prop_info.rest_recommend);
						HB.util.Cookie.set('get_task_type_sign', 1, {
				            domain: document.domain,
				            path: "/",
				            expires: new Date(GetDateStr(1))
				        });
                        // window.location.reload();
		            } else if (res.code == 340003) {
                        HB.util.Cookie.set('get_task_type_sign', 1, {
                            domain: document.domain,
                            path: "/",
                            expires: new Date(GetDateStr(1))
                        });
                    } else {
		                // HB.util.alert(res.tip,1);
		            }
		        }
		    });
		}
	})();
	//移动端显示底部下载提示
	function browserRedirect() {
		var sUserAgent = navigator.userAgent.toLowerCase();
		var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
		var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
		var bIsMidp = sUserAgent.match(/midp/i) == "midp";
		var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
		var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
		var bIsAndroid = sUserAgent.match(/android/i) == "android";
		var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
		var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
		if ( bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM ){
			var html = '<div class="download-app">' +
				'<span class="close-btn"></span>' +
				'<img class="ly-fl" src="'+HB.config.rootPath+'resources/images/logo_s.png" alt="刺猬猫"/>' +
				'<h1 class="title">刺猬猫客户端</h1>' +
				'<p class="desc">下载APP看书会更爽</p>' +
				'<a class="download-btn" href="'+HB.config.rootPath+'setting/download">下载</a>' +
				'</div>';
			$("body").append(html);
			$(document).on("click", ".close-btn", function(){
				$(this).parent(".download-app").hide();
			});
		}
	}
        if (!HB.activity) {
		browserRedirect();
	}

	//侧边APP下载提示
	function AppDownloadSite() {
		var windowWidth = window.innerWidth,
			width_const = 1400,
			left = (windowWidth - 1200)/2 + 1200 + 10,
			right = "auto";

		windowWidth < width_const ? $("#J_AppDownloadSite").addClass("less") : $("#J_AppDownloadSite").removeClass("less");

		if ($("#J_AppDownloadSite").hasClass("less")) {
			if (windowWidth < 1140) {
				left = "auto";
				right = 0;
			} else if (windowWidth >= 1140 && windowWidth < 1280) {
				left = (windowWidth - 990)/2 + 990 + 10;
			} else if (windowWidth >= 1280 && windowWidth < 1350) {
				left = (windowWidth - 1200)/2 + 1200 - 20;
			}
		}
		$("#J_AppDownloadSite").css({left: left, right: right});
	}
	AppDownloadSite();
	$(window).resize(function () {
		AppDownloadSite()
	});
	
	// 帮助中心
	$('.submenu > a').click(function (e) {
		e.preventDefault();
		var submenu = $(this).siblings('ul');
		var li = $(this).parents('li');
		var ind = li.index();
		var submenus = $('#sidebar li.submenu ul');
		var submenus_parents = $('#sidebar li.submenu');
		if (li.hasClass('open')) {
			submenu.slideUp();
			li.removeClass('open');
		} else {
			submenus.slideUp();
			submenu.slideDown();
			submenus_parents.removeClass('open');
			li.addClass('open');
			$('ul li a', li).first().click();
			$(".help-center .cnt-box").hide().removeClass("current");
			var cnt_box = $(".help-center .cnt-box[data-index='" + ind + "']");
			cnt_box.show().addClass("current");
			$(".sub-box", cnt_box).first().show();
		}
	});

	
	$('.submenu ul li a').click(function (e) {
		e.preventDefault();
		var self = $(this);
		self.parent().siblings().find("a").removeClass("selected");
		self.addClass("selected");
		var ind = self.parent().index();
		$(".help-center .cnt-box.current .sub-box").hide().eq(ind).show();
	});
	
	//章节目录
	$(document).on("click", ".btn-fold", function () {
		var $box = $(this).closest(".book-chapter-box");
		$box.toggleClass("fold");
	});
	//书单详情 展开推荐语
	$(document).on("click", ".btn-expand", function () {
		var $box = $(this).closest(".J_ExpandBox");
		$box.toggleClass("expand");
	});
        
        //书库显示全部标签
	$(".J_BtnShowAll").on("click", function () {
		$("#J_DialogLabel").show();
	});
	$("#J_DialogLabel .dialog-mask").on("click", function () {
		$(this).parent().hide();
	});
	//标签筛选
	$("#J_DialogLabel .J_LabelBox li").on("click", function () {
		$(this).toggleClass("selected");
	});
	$("#J_DialogLabel .J_BtnSubmit").on("click", function () {
		var init_label_str = "", label_str,
			url = window.location.href,
			url2 = url.substring(0, url.lastIndexOf("/")),
			url3 = url2.substring(0, url2.lastIndexOf("/")),
			path = window.location.pathname,
			path_arr = path.split("/");

		$("#J_DialogLabel .J_LabelBox li.selected").each(function(i , val) {
			init_label_str += $(val).find("a").text() + "-";
		});
		label_str = init_label_str.substr(0, (init_label_str.length - 1));

		if (path_arr.length == 2) {
			window.location.href = url + '/0-0-0-0-0-0/' + label_str + '/1';
		} else {
			window.location.href = url3 + '/' + label_str + '/1';
		}
	});
});





var Img={
    _uri: '',
    _imgWidth:420,
    _imgHeight:420,
    /*  文件选择框
     *   FileVal     : 选择后用于存放结果的元素
     *   FileUpload  : FileUpload上传文件框
     * */
    OpenBrowse: function openBrowse(FileVal,FileUpload){
        var ie=navigator.appName=="Microsoft Internet Explorer" ? true : false;
        if(ie){
            document.getElementById(FileUpload).click();

            var sourceEl = document.getElementById(FileVal);
            if(null==sourceEl || typeof(sourceEl)==undefined){

            } else{
                document.getElementById(FileVal).value=document.getElementById("upload_file").value;
            }

        }else{
            var a=document.createEvent("MouseEvents");//FF的处理
            a.initEvent("click", true, true);
            document.getElementById(FileUpload).dispatchEvent(a);
        }

    }
    /*
     *   通用裁剪图片方法,需要引入 outwindow1及样式
     *   图片提交后通过返回图片地址调用此函数来启动裁剪窗口
     * */
    ,showImg:function show_img(filepath) {
        //alert(filepath);
        $('div[class="img_a"]').show();
        //$("form[id='uploadFrom']").hide();
        $('#SaveCropPic').show();
        var newFile=filepath+'?'+Math.random();
        $("#img_2").attr('src',newFile);
        $("#img_1").attr('src',newFile);

        var img=$('#img_1');
        this.CropImg(img);
    },

    /*  显示  图像处理界面  */
    showUploadWindow:function() {
        $("form[id='uploadFrom']").show();
        $('div[class="img_a"]').hide();

        $(".outwindow1").show();
        var img=$('#img_1');
        this.CropImg(img);
    },
    //  ----    载入图片、选择图片区域 ----
    CropImg:function img_sf(simg,parent){

        //alert(simg + '/' + parent);

        //  var db=document.body;
        _imgWidth=simg.width();
        _imgHeight=simg.height();

        var db= document.getElementById(parent);
        //console.log(simg);

        var img1=document.getElementById('img_1');
        var img3=document.getElementById('img_3');
        var bl=[100/120,150/50,120/24]; //裁剪框为100，预览框为120，显示比例使用100/120,hw()中使用

        var div=document.getElementById('img_b3');
        var d_t=document.getElementById('img_b1');
        var d_y=document.getElementById('img_b4');
        var d_x=document.getElementById('img_b5');
        var d_l=document.getElementById('img_b2');
        var self={};
        var iwh=Math.min(_imgHeight,_imgWidth);
        var sf=document.getElementById('img_dsf');
        var hh = div.offsetHeight;
        var ww= div.offsetWidth;
        if(hh != ww){
            var bl=[100/100,150/50,120/24];//裁剪框为288*164，预览框为288*164，显示比例使用100/100,hw()中使用
        }
        if(_imgWidth<288){
            var bl=[_imgWidth/288,_imgWidth/288,_imgWidth/288];
        }
        hw();
        yd(div.offsetTop,div.offsetLeft);

        div.onmousedown=function(e){
            var e=e||event;
            self.x=e.clientX-this.offsetLeft;
            self.y=e.clientY+document.documentElement.scrollTop-this.offsetTop;
            try{e.preventDefault();}catch(o){e.returnValue = false;}
            document.onmousemove=function(e){
                var e=e||event;
                var t=e.clientY+document.documentElement.scrollTop-self.y ;
                var l=e.clientX-self.x;

                t=Math.min(t,_imgHeight-div.offsetHeight);
                l=Math.min(l,_imgWidth-div.offsetWidth);

                t=Math.max(t,0);
                l=Math.max(l,0);
                //console.log(123);
                yd(t,l);
            }
        }

        sf.onmousedown=div.onmouseup=function(){
            document.onmousemove='';
        }

        sf.onmousedown=function(e){
            var e=e||event;
            self.x=e.clientX-this.offsetLeft;
            self.y=e.clientY+document.documentElement.scrollTop-this.offsetTop;
            try{e.preventDefault();}catch(o){e.returnValue = false;}
            try{e.stopPropagation();}catch(o){e.cancelBubble = true;}
            document.onmousemove=function(e){
                var e=e||event;
                var t=e.clientY+document.documentElement.scrollTop-self.y;
                var l=e.clientX-self.x;

                //
                if(t>_imgHeight-div.offsetTop || l>_imgWidth-div.offsetLeft){
                    document.onmousemove='';
                }

                if(ww==hh){ //正方形用
                    l=Math.max(t,l);
                    l=l>iwh?iwh:l;
                    if(l<100){
                        l=100;
                    }
                    if(t<100)
                        t = 100;
                    sff(l,l);
                }else{//288*164用
                    if(_imgHeight>_imgWidth){
                        //l=l>iwh?iwh:l;
                        //console.log('鼠标t:'+t);
                        //console.log('鼠标l:'+l);
                        if(t>Math.floor(l*hh/ww)){
                            l = Math.floor(t*ww/hh);
                        }else{
                            t = Math.floor(l*hh/ww);
                        }
                    }else{
                        //t=t>iwh?iwh:t;
                        if(l> Math.floor(t*ww/hh)){
                            t = Math.floor(l*hh/ww);
                        }else{
                            l = Math.floor(t*ww/hh);
                        }
                    }
                    sff(t,l);
                }
            }
        }

        function sff(t,l){

            var w=div.offsetWidth;

            if(t==l){//正方形用
                if(l>_imgWidth-div.offsetLeft-10)
                    l = _imgWidth-div.offsetLeft-10;
                if(t>_imgHeight-div.offsetTop-10)
                    t = _imgHeight-div.offsetTop-10;
                t =  t>l?l:t;
                l =  t;
                bl=[w/120,w/50,w/24];
            }else{//288*164用
                if(_imgWidth<_imgHeight){
                    if(l>_imgWidth-div.offsetLeft-10){
                        l = _imgWidth-div.offsetLeft-10;
                        t=l*164/288;
                    }
                    if(t>410){
                        t=410;
                        l=t/164*288;
                    }
                    console.log('t:'+t+",l:"+l);
                }else{
                    if(t>_imgHeight-div.offsetTop-10)
                        t = _imgHeight-div.offsetTop-10;

                    if(l>410){
                        l=410;
                        t=l*164/288;
                    }
                    if(l>_imgWidth-div.offsetLeft-10){
                        l = _imgWidth-div.offsetLeft-10;
                        t = l*164/288;
                    }
                    if(l>(_imgHeight-div.offsetTop-10)/164*288){
                        l=(_imgHeight-div.offsetTop-10)/164*288;

                        t=l*164/288;
                    }
                }
                bl=[w/288,w/140,w/60];
            }

            sf.style.top=t+'px';
            sf.style.left=l+'px';

            div.style.width=(l+10)+'px';
            div.style.height=(t+10)+'px';


            //console.log(div.style.width);
            //console.log(div.style.height);

            yd(div.offsetTop,div.offsetLeft);

            hw();
            db.imgh=l+10;
        }

        //  鼠标移动
        function yd(t,l){
            d_t.style.height=t+'px';
            d_x.style.height=_imgHeight-t-div.offsetHeight+'px';
            d_l.style.top=d_y.style.top=div.style.top=t+'px';
            d_l.style.width=div.style.left=l+'px';
            d_y.style.width=_imgWidth-l-div.offsetWidth+'px';
            d_l.style.height=d_y.style.height=div.offsetHeight+'px';
            //  第一张缩略图
            img1.style.left=-l/bl[0]+'px';
            if(div.offsetWidth==288&&ww!=hh){//288*164用
                img1.style.top=-t+'px';
            }else{//正方形用
                img1.style.top=-t/bl[0]+'px';
            }



            //  第二张缩略图
            if($('.img_c_2').hasClass('img_c_2')){
                var w=div.offsetWidth;
                //bl=[w/164,w/164,w/164];
                img3.style.top=-t/bl[0]+'px';
                img3.style.left=-l/bl[0]+'px';
            }




            db.xy=[t,l];
        }

        //  --  按比例设置图片大小：宽、高
        function hw(){
            //  $("#test123").text('height=' + _imgWidth + '/width=' + img_width + '/ratio=' + bl[0]);

            $("#img_1").css('height',_imgHeight/bl[0]);
            $("#img_1").css('width',_imgWidth/bl[0]);

            if($('.img_c_2').hasClass('img_c_2')) {
                //img3.height= _imgHeight/bl[0];
                //img3.width=_imgWidth/bl[0];
                $("#img_3").css('height',_imgHeight/bl[0]);
                $("#img_3").css('width',_imgWidth/bl[0]);
            }
        }

    },
    //  ----    保存裁剪图片  ----
    SaveCropImg:function(UpSource,UploadUrl) {
        var FileUrl=$('img[id="img_2"]').attr('src');
        var img3=document.getElementById('img_b3');
        var left=img3.offsetLeft;
        var top=img3.offsetTop;
        var width=img3.offsetWidth;
        var height=img3.offsetHeight;
        var url1=UploadUrl;             //  保存图片的地址及类型： community/upload/savepic?type=music&id=100

        $("#left").val(left);
        $("#top").val(top);
        $("#width").val(width);
        $("#height").val(height);
        //alert($("#"+UpSource).val());
        $("#"+UpSource).parent().submit();
    },

    addCallbacks: function()
    {
        $('input[id="SaveCropPic"]').bind('click',book.SaveCropImg);
    },

    /**
     * Initializes the view (highlighters, callbacks, etc)
     */
    initializeView: function(uri)
    {
        this._uri = uri;
        this.addCallbacks();
    }

};

/* ========================================================================
 * Bootstrap: dropdown.js v3.3.7
 * http://getbootstrap.com/javascript/#dropdowns
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */
+function ($) {
	'use strict';

	// DROPDOWN CLASS DEFINITION
	// =========================

	var backdrop = '.dropdown-backdrop'
	var toggle   = '[data-toggle="dropdown"]'
	var Dropdown = function (element) {
		$(element).on('click.bs.dropdown', this.toggle)
	}

	Dropdown.VERSION = '3.3.7'

	function getParent($this) {
		var selector = $this.attr('data-target')

		if (!selector) {
			selector = $this.attr('href')
			selector = selector && /#[A-Za-z]/.test(selector) && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
		}

		var $parent = selector && $(selector)

		return $parent && $parent.length ? $parent : $this.parent()
	}

	function clearMenus(e) {
		if (e && e.which === 3) return
		$(backdrop).remove()
		$(toggle).each(function () {
			var $this         = $(this)
			var $parent       = getParent($this)
			var relatedTarget = { relatedTarget: this }

			if (!$parent.hasClass('open')) return

			if (e && e.type == 'click' && /input|textarea/i.test(e.target.tagName) && $.contains($parent[0], e.target)) return

			$parent.trigger(e = $.Event('hide.bs.dropdown', relatedTarget))

			if (e.isDefaultPrevented()) return

			$this.attr('aria-expanded', 'false')
			$parent.removeClass('open').trigger($.Event('hidden.bs.dropdown', relatedTarget))
		})
	}

	Dropdown.prototype.toggle = function (e) {
		var $this = $(this)

		if ($this.is('.disabled, :disabled')) return

		var $parent  = getParent($this)
		var isActive = $parent.hasClass('open')

		clearMenus()

		if (!isActive) {
			if ('ontouchstart' in document.documentElement && !$parent.closest('.navbar-nav').length) {
				// if mobile we use a backdrop because click events don't delegate
				$(document.createElement('div'))
					.addClass('dropdown-backdrop')
					.insertAfter($(this))
					.on('click', clearMenus)
			}

			var relatedTarget = { relatedTarget: this }
			$parent.trigger(e = $.Event('show.bs.dropdown', relatedTarget))

			if (e.isDefaultPrevented()) return

			$this
				.trigger('focus')
				.attr('aria-expanded', 'true')

			$parent
				.toggleClass('open')
				.trigger($.Event('shown.bs.dropdown', relatedTarget))
		}

		return false
	}

	Dropdown.prototype.keydown = function (e) {
		if (!/(38|40|27|32)/.test(e.which) || /input|textarea/i.test(e.target.tagName)) return

		var $this = $(this)

		e.preventDefault()
		e.stopPropagation()

		if ($this.is('.disabled, :disabled')) return

		var $parent  = getParent($this)
		var isActive = $parent.hasClass('open')

		if (!isActive && e.which != 27 || isActive && e.which == 27) {
			if (e.which == 27) $parent.find(toggle).trigger('focus')
			return $this.trigger('click')
		}

		var desc = ' li:not(.disabled):visible a'
		var $items = $parent.find('.dropdown-menu' + desc)

		if (!$items.length) return

		var index = $items.index(e.target)

		if (e.which == 38 && index > 0)                 index--         // up
		if (e.which == 40 && index < $items.length - 1) index++         // down
		if (!~index)                                    index = 0

		$items.eq(index).trigger('focus')
	}


	// DROPDOWN PLUGIN DEFINITION
	// ==========================

	function Plugin(option) {
		return this.each(function () {
			var $this = $(this)
			var data  = $this.data('bs.dropdown')

			if (!data) $this.data('bs.dropdown', (data = new Dropdown(this)))
			if (typeof option == 'string') data[option].call($this)
		})
	}

	var old = $.fn.dropdown

	$.fn.dropdown             = Plugin
	$.fn.dropdown.Constructor = Dropdown


	// DROPDOWN NO CONFLICT
	// ====================

	$.fn.dropdown.noConflict = function () {
		$.fn.dropdown = old
		return this
	}


	// APPLY TO STANDARD DROPDOWN ELEMENTS
	// ===================================

	$(document)
		.on('click.bs.dropdown.data-api', clearMenus)
		.on('click.bs.dropdown.data-api', '.dropdown form', function (e) { e.stopPropagation() })
		.on('click.bs.dropdown.data-api', toggle, Dropdown.prototype.toggle)
		.on('keydown.bs.dropdown.data-api', toggle, Dropdown.prototype.keydown)
		.on('keydown.bs.dropdown.data-api', '.dropdown-menu', Dropdown.prototype.keydown)

}(jQuery);