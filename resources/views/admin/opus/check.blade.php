<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
<script type="text/javascript" src="http://libs.useso.com/js/respond.js/1.4.2/respond.min.js"></script>
<script type="text/javascript" src="http://cdn.bootcss.com/css3pie/2.0beta1/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />

<!--[if IE 7]>
<link href="http://www.bootcss.com/p/font-awesome/assets//admin/css/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<title>用户查看</title>
</head>
<body>
<div class="page-container">
<div class="cl pd-20" style=" background-color:#FFF">
   <h3 align="center">{{$rs['title']}}</h3>
</div>
<div class="pd-20">
  <table class="table">
    <tbody>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;{{$rs['chapterinfo']['content']}}</p>
    </tbody>
  </table>
</div>
    <div class="cl pd-5  mt-20" "> <span class="l"><a href="javascript:;" onclick="examine_pass({{$rs['id']}})" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe6e1;</i> 审核通过</a>@if($rs['status']==3) <a href="javascript:;" onclick="examine_false({{$rs['id']}},{{$rs['status']}})"  class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6dd;</i> 冻结作品</a>@else <a href="javascript:;" onclick="examine_false({{$rs['id']}},{{$rs['status']}})"  class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6dd;</i> 审核不通过</a>@endif</span> </div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<!-- <script type="text/javascript" src="/admin/lib/jquery/jquery-3.3.1.min.js"></script>  -->
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去--> 
<script>
/**
 * 作品审核--通过
 * @param  {[type]} id [description]
 * @return {[type]}    [description]
 */
function examine_pass(id){
  layer.confirm('确认通过吗？',function(index){
        console.log(id);
        $.get('/ciwei/pass',{'id':id,'status':'1'},function(data){
             parent.location.reload();
             parent.layer.close(index);
        })
  })
}
function examine_false(id,status){
  layer.confirm('确认不通过吗？',function(index){
        console.log(id);
        if(status == 3) {

          $.get('/ciwei/pass',{'id':id,'status':'4'},function(data){
               parent.location.reload();
               parent.layer.close(index);
          })
        }else{
          $.get('/ciwei/pass',{'id':id,'status':'2'},function(data){
               parent.location.reload();
               parent.layer.close(index);
          })
        }
  })
}
</script>
</body>
</html>