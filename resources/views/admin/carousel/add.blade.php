<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>新增图片</title>
<link href="/admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
    <!-- 显示错误信息 -->
    @if (count($errors) > 0)
    	 <div class="Huialert Huialert-error">

    	     <i class="Hui-iconfont">&#xe6a6;</i>
    	     <ul>
	            @foreach ($errors->all() as $error)

	                <li>{{ $error }}</li>
	            @endforeach
	         </ul>
    	 </div>
	@endif
	<form class="form form-horizontal" id="form-article-add" method="post" action="/ciwei/lunbo" enctype="multipart/form-data">
	   {{csrf_field()}}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>名　　称：</label>
			<div class="formControls col-xs-5 col-sm-5">
				<input type="text" class="input-text" value="{{old('name')}}" placeholder="" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>类　　别：</label>
			<div class="formControls col-xs-5 col-sm-5">
				<span class="select-box">
				<select name="type" class="select type">
					<option value="" select> 请选择</option>
					<option value="0">小说类</option>
					<option value="1">公告类</option>
				</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状　　态：</label>
			<div class="formControls col-xs-5 col-sm-5">
				<span class="select-box">
				<select name="status" class="select">
					<option value="" selected> 请选择</option>
					<option value="0">开启</option>
					<option value="1">禁用</option>
				</select>
				</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">图片来源：</label>
			<div class="formControls col-xs-5 col-sm-5">
				<input type="text" class="input-text" value="0" placeholder="" id="ids" name="urlid">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">图片上传：</label>
			<div class="formControls col-xs-5 col-sm-6">
				<span class="btn-upload form-group">
				<input class="input-text upload-url" type="text" name="uploadfile-2" id="uploadfile-2" readonly="" style="width:517px">
				<a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont"></i> 上传logo</a>
				<input type="file" multiple="" name="image" class="input-file">
			</span>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
			</div>
		</div>
	</form>
</div>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->


<script type="text/javascript">
$('#name').change(function(){
     name = $(this).val();
     $('#name').css('border','solid 1px #ddd'); 
})
	 $('.type').change(function(){
		type = $(this).val();
		if(type ==0){
		$.get('/ciwei/lunbotype',{'type':type,'name':name,'table':'novel'},function(data){
			if(data ==0){
				$('#name').select();
				$('#name').css('border','1px solid red');
				$('.type option').eq(0).attr('selected',true);
				
				layer.msg("小说名不存在",{icon:1,time:1000});
			}else{
				$('#name').css('border','solid 1px #ddd');
				$('#ids').val(data);
				console.log(data);
			}
		})
	}else{
		$.get('/ciwei/lunbotype',{'type':type,'name':name,'table':'notice'},function(data){
			if(data ==0){
				$('#name').select();
				$('#name').css('border','1px solid red');
				console.log($('.type option').eq(0));
				$('.type option').eq(0).attr('selected',true);
				
				layer.msg("公告名不存在",{icon:1,time:1000});
			}else{
				$('#name').css('border','solid 1px #ddd');
				$('#ids').val(data);
				console.log(data);
			}
		})
	}	
	 })
	
</script>
@if(session('error'))
    <script>
			layer.msg("{{session('error')}}",{icon:1,time:1000});
	</script>
 @endif
 @if(session('err'))
    <script>
			layer.msg("{{session('err')}}",{icon:1,time:1000});
	</script>
 @endif
 @if(session('er'))
    <script>
			layer.msg("{{session('er')}}",{icon:1,time:1000});
	</script>
 @endif
</body>
</html>