<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/admin/lib//html5shiv.js"></script>
<script type="text/javascript" src="/admin/lib//respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib//Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/admin/lib//DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 推送管理 <span class="c-gray en">&gt;</span> 宅文推荐管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="/ciwei/click"  class="btn btn-danger radius"><i class="Hui-iconfont">&#xe648;</i> 点击率</a> <a href="/ciwei/tuijian" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe66d</i> 推荐率</a></span></div>
	<div class="mt-20">
		<div class="dataTables_wrapper no-footer">
			<table class="table table-border table-bordered table-bg">
				<thead>
					<tr class="text-c">
						<th width="40">ID</th>
						<th width="150">小说标题</th>
						<th width="90"> 小说状态</th>
						<th width="150">推荐率</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				<tbody>
				    @foreach($res as $v)
					<tr class="text-c">
						<td>{{$id++}}</td>
						<td>{{$v->title}}</td>
						<td>{{$v->state}}</td>
						<td>{{$v->recommend}}</td>
						<td class="td-manage"><a style="text-decoration:none" onClick="click_count(this,{{$v->id}})" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe600;</i></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
	    	{{$res->links('common.pagination')}}
		</div>
	</div>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib//jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/lib//layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib//My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/admin/lib//datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/admin/lib//laypage/1.2/laypage.js"></script>
<script type="text/javascript">

/*管理员-停用*/
function click_count(obj,id){
	layer.confirm('确认要添加吗？',function(index){
		layer.close(index);
  //       $.get('/ciwei/addlick',{'id':id},function(data){
  //             console.log(data);
		// $(obj).parents("tr").find(".td-manage").prepend('<span  href="javascript:;" title="已加入" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></span>');
		// $(obj).remove();
		// layer.msg('已启用!',{icon: 6,time:1000});
  //       })       
		$.ajax({
			type: 'GET',
			url: '/ciwei/addlick',
			data:'id='+id,
			dataType: 'json',
			success: function(data){
				console.log(data);
				$(obj).parents("tr").find(".td-manage").prepend('<span  href="javascript:;" title="已加入" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></span>');
				$(obj).remove();
				layer.msg('已加入!',{icon: 6,time:1000});

			},
			error:function(data) {
				console.log(data);
				layer.msg('小说已经存在',{icon: 5,time:1000});
			},
		});
	});
}	
</script>
</body>
</html>