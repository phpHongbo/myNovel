<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>刺猬猫小说后台管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 分类管理 <span class="c-gray en">&gt;</span> 分类列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="/ciwei/type/create"  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加分类</a></span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="80">ID</th>
				<th width="100">分类名称</th>
				<th width="70">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($res as $v)
			<tr class="text-c">
				<td><input type="checkbox" value="{{$v->id}}" name=""></td>
				<td>{{$v->id}}</td>
				<td>{{$v->name}}</td>
				<td class="td-status">
				@if($v->status == 0)
				    <span class="label label-success radius">已显示</span>
				@else
				<span class="label label-defaunt radius">已隐藏</span>
				@endif
				</td>
				<td class="td-manage">
				@if($v->status == 0)
				<a style="text-decoration:none" onClick="member_stop(this,{{$v->id}})" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
				@else
				<a style="text-decoration:none" onClick="member_start(this,{{$v->id}})" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>
				@endif
				<a title ='编辑' href="/ciwei/type/{{$v->id}}/edit"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe63f;</i></a> <a title="删除" href="javascript:;" onclick="member_del(this,{{$v->id}})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		   @endforeach
		</tbody>
	</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<!-- <script type="text/javascript" src="/admin/lib/jquery/jquery-3.3.1.min.js"></script>  -->
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<!-- <script type="text/javascript" src="/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>  -->
<script type="text/javascript" src="/admin/lib/laypage/1.2/laypage.js"></script>
@if(session('success'))
    <script>
			layer.msg("{{session('success')}}",{icon:1,time:1000});
	</script>
 @endif
<script type="text/javascript">

/*分类-停用*/
function member_stop(obj,id){
	layer.confirm('确认要隐藏吗？',function(index){
		layer.close(index);
		$.ajax({
			type: 'GET',
			url: '/ciwei/stop/',
			data:'id='+id+'&status=1',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="显示"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已隐藏</span>');
				$(obj).remove();
				layer.msg('已隐藏!',{icon: 5,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*分类-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		layer.close(index);
		$.ajax({
			type: 'GET',
			url: '/ciwei/stop/',
			data:'id='+id+'&status=0',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="隐藏"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已显示</span>');
				$(obj).remove();
				layer.msg('已显示!',{icon: 6,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
/*分类-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		layer.close(index);
	    if(obj.parentNode.parentNode.firstElementChild.firstElementChild.checked){
			$.get('/ciwei/typedel/',{id:id},function(data){
				if(data ==1){
				   $(obj).parents("tr").remove();
	               layer.msg('删除成功!',{icon:1,time:1000});
				}else{
	               layer.msg('删除失败!',{icon:1,time:1000});
				}
			})	
	  	}else{
	  		layer.msg('请选中删除',{icon:1,time:1000});
	  	}
	});
}
/*分类 批量删除*/
function datadel(){
    layer.confirm('确认要删除吗？',function(index){
	var ids = new Array();
	$(":checked").each(function(){
		if($(this).prop('checked')){
			ids.push($(this).val());
		}
	})
  layer.close(index);    		
  $.get('/ciwei/typedelall/',{ids:ids},function(data){
				   console.log(data);
				if (data ==1) {
				    $(":checked").each(function(){
						if($(this).prop('checked')){
							if($(this).val() !=''){
							  $(this).parents('tr').remove();
						   }
						}
					})
	               layer.msg('删除成功!',{icon:1,time:1000});
				} else {
	               layer.msg('删除失败!',{icon:1,time:1000});
				}
			});	
	});
}

</script> 
</body>
</html>
