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
<title>图片列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 推送管理 <span class="c-gray en">&gt;</span> 轮播图管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="/ciwei/lunbo/create"><i class="Hui-iconfont">&#xe600;</i> 添加图片</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<div class="mt-20">
	     <form action="/ciwei/lunbo" moethod="get">
			<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
				<div class="dataTables_length" id="DataTables_Table_0_length">
					<label>显示 
						<select name="num" aria-controls="DataTables_Table_0" class="select">
						<option value="10" @if($request->num == 10) selected @endif>10</option>
						<option value="20" @if($request->num == 20) selected @endif>20</option>
						<option value="30" @if($request->num == 30) selected @endif>30</option>
						</select> 条
					</label>
				</div>
				<div id="DataTables_Table_0_filter" class="dataTables_filter">
					<input type="text" placeholder="请输入关键字" class="input-text ac_input" name="search"  style="width:200px" value="{{$request->search}}">
					<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
			</div>
		</form>
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="40"><input name="" type="checkbox" value=""></th>
					<th width="80">ID</th>
					<th width="100">名称</th>
					<th width="150">类别</th>
					<th width="100">图片</th>
					<th width="60">发布状态</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			    @foreach($rs as $v)
				<tr class="text-c">
					<td><input name="" type="checkbox" value="{{$v->id}}"></td>
					<td>{{$rs->firstItem()+$id++}}</td>
					<td class="text-l">{{$v->name}}</td>
					<td class="text-c">{{$v->type == 0 ? '小说类' : '公告类'}}</td>
					<td><img width="150" class="picture-thumb" src="{{$v->image}}"></td>
					<td class="td-status">
					@if($v->status == 0)
					<span class="label label-success radius">已发布</span>
					@else
					<span class="label label-defaunt radius">已下架</span>
					@endif
					</td>
					<td class="td-manage">
					@if($v->status == 0)
					<a style="text-decoration:none" onClick="picture_stop(this,{{$v->id}})" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>
					@else<a style="text-decoration:none" onClick="picture_start(this,{{$v->id}})" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>
					@endif
					<a style="text-decoration:none" class="ml-5" href="/ciwei/lunbo/{{$v->id}}/edit" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="picture_del(this,{{$v->id}})" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">显示 {{$rs->firstItem()}} 到 {{$rs->lastItem()}} ，共 {{$rs->count()}} 条</div>{{$rs->appends($request->all())->links('common.pagination')}}
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

/*图片-下架*/
function picture_stop(obj,id){
		console.log(id);
	layer.confirm('确认要下架吗？',function(index){
		layer.close(index);
		$.ajax({
			type: 'GET',
			url: '/ciwei/lunbostatus/',
			data:'id='+id+'&status=1',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_start(this,{{$v->id or ''}})" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
				$(obj).remove();
				layer.msg('已下架!',{icon: 5,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});	
		
	});
}

/*图片-发布*/
function picture_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
		layer.close(index);
		$.ajax({
			type: 'GET',
			url: '/ciwei/lunbostatus/',
			data:'id='+id+'&status=0',
			dataType: 'json',
			success: function(data){
				if(data ==3){
					
					return;
				}else{
					$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
					$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
					$(obj).remove();
					layer.msg('已发布!',{icon: 6,time:1000});
				}
			},
			error:function(data) {
				layer.msg('显示条数不能大于7',{icon: 5,time:1000});
			},
		});
		
	});
}
/*轮播-删除*/
function picture_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		layer.close(index);
	    if(obj.parentNode.parentNode.firstElementChild.firstElementChild.checked){
			$.get('/ciwei/lunbodel/',{id:id},function(data){
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
/*轮播 批量删除*/
function datadel(){
    layer.confirm('确认要删除吗？',function(index){
	var ids = new Array();
	$(":checked").each(function(){
		if($(this).prop('checked')){
			ids.push($(this).val());
		}
	})
	console.log(ids);
  layer.close(index);    		
  $.get('/ciwei/lunbodelall/',{ids:ids},function(data){
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
@if(session('success'))
     <script>
			layer.msg("{{session('success')}}",{icon:1,time:1000});
	</script>
 @endif
</body>
</html>