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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 作品管理 <span class="c-gray en">&gt;</span> 敏感词管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="/ciwei/senwords/create"  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加敏感词</a></span></div>
	<div class="mt-20">
	<form action="/ciwei/senwords" moethod="get">
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
				<input type="text" placeholder="请输入敏感词" class="input-text ac_input" name="search"  style="width:200px" value="{{$request->search}}">
				<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
			</div>
	</form>
	   <table class="table table-border table-bordered table-bg table-hover table-sort dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
			<thead>
				<tr class="text-c" role="row">
					<th width="80">ID</th>
					<th width="150">敏感词名</th>
					<th width="80">操作</th>
				</tr>
			</thead>
			<tbody>
			@foreach($res as $v)
			<tr class="text-c odd" role="row">
					<td>{{$res->firstItem()+$id++}}</td>
					<td>{{$v->name}}</td>
					<td class="td-manage"><a style="text-decoration:none"  href="/ciwei/senwords/{{$v->id}}/edit" title="编辑"><i class="Hui-iconfont">&#xe60c;</i></a><a title="删除" href="javascript:;" onclick="words_del(this,{{$v->id}})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			@endforeach
			</tbody>
		</table><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">显示 {{$res->firstItem()}} 到 {{$res->lastItem()}} ，共 {{$res->count()}} 条</div>{{$res->appends($request->all())->links('common.pagination')}}
		</div>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib//jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/lib//layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<script>
/*敏感词-删除*/
function words_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		layer.close(index);
			$.get('/ciwei/wordsdel/',{id:id},function(data){
				console.log(data);
				if(data ==1){
				   $(obj).parents("tr").remove();
	               layer.msg('删除成功!',{icon:1,time:1000});
				}else{
	               layer.msg('删除失败!',{icon:1,time:1000});
				}
			})	
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