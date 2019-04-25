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
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="mt-20">
	<form action="/ciwei/users" moethod="get">
	<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
		<div class="dataTables_length" id="DataTables_Table_0_length">
			<label>显示 
				<select name="num" aria-controls="DataTables_Table_0" class="select">
				<option value="10" @if($request->num == 10) selected="selected" @endif>10</option>
				<option value="20" @if($request->num == 20) selected="selected" @endif>20</option>
				<option value="30" @if($request->num == 30) selected="selected" @endif>30</option>
				</select> 条
			</label>
		</div>
		<div id="DataTables_Table_0_filter" class="dataTables_filter">
			<input type="text" placeholder="输入邮箱" class="input-text ac_input" name="email" value="" style="width:200px" value="{{$request->email}}">
			<input type="text" placeholder="输入用户名" class="input-text ac_input" name="search" value="" style="width:200px" value="{{$request->search}}">
			<button type="submit" class="btn btn-default" id="search_button">搜索</button>
		</div>
	</form>
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="80">ID</th>
				<th width="100">用户名</th>
				<th width="40">性别</th>
				<th width="90">手机</th>
				<th width="150">邮箱</th>
				<th width="130">注册时间</th>
				<th width="70">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data as $val)
			<tr class="text-c">
				<td>{{$data->firstItem()+$i++}}</td>
				<td><u style="cursor:pointer" class="text-primary" onclick='member_show("{{$val->username}}","/ciwei/users/{{$val->id}}","10001","360","400")'>{{$val->username}}</u></td>
				<td>男</td>
				<td>{{$val->phone or '未绑定'}}</td>
				<td>{{$val->email or '未绑定'}}</td>
				<td>{{ date("Y-m-d H:i:s",$val->addtime) }}</td>
				<td class="td-status">
				@if ($val->status == 0)
					<span class="label label-success radius">已启用</span>
				</td>
				<td class="td-manage">
					<a onClick="member_stop(this,{{$val->id}})" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>
				</td>
				@else
					<span class="label radius">已停用</span>
				</td>
				<td class="td-manage">
					<a style="text-decoration:none" onClick="member_start(this,{{$val->id}})" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe615;</i></a>
				</td>
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">显示 {{$data->firstItem()}} 到 {{$data->lastItem()}} ，共 {{$data->count()}} 条</div>
	{{--$data->appends($request->all())->render()--}}
	{{$data->appends($request->all())->links('common.pagination')}}
	</div>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type:'GET',
			url:'/ciwei/users/status',
			data:`id=${id}&status=1`,
			success:function(data){
				if(data == 1){
					$(obj).parents("tr").find(".td-manage").prepend('<a onClick="member_start(this,'+id+')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label radius">已停用</span>');
					$(obj).remove();
					layer.msg('已停用!',{icon: 5,time:1000});
				}else{
					layer.msg(data,{icon: 5,time:1000});
				}
			},
			async:false
		});	
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type:'GET',
			url:'/ciwei/users/status',
			data:`id=${id}&status=0`,
			success:function(data){
				if(data == 1){
					$(obj).parents("tr").find(".td-manage").prepend('<a onClick="member_stop(this,'+id+')" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
					$(obj).remove();
					layer.msg('已启用!', {icon: 6,time:1000});
				}else{
					layer.msg(data,{icon: 5,time:1000});
				}
			},
			async:false
		});
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
@if(session('error'))
	layer.msg("{{session('error')}}",{icon: 5,time:1000});
@endif
</script> 
</body>
</html>