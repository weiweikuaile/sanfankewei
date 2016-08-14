<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>详情</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="/homes/css/bootstrap.min.css">
	<link rel="stylesheet" href="/homes/css/bootstrap-fangdajing.css">
	<link rel="stylesheet" href="/homes/css/bootstrap-theme.min.css">
	<script src="/homes/js/bootstrap.min.js"></script>
	<script src="/homes/js/jquery-1.11.3.min.js"></script>
	<script src="/homes/js/bootstrap-fangdajing.js"></script>
	<style>
	/*	#zonglei{height:50px;margin-bottom:15px;}*/
		.fenlei{float:left;width:10%;}
		.fenlei1{margin-top:5px;font-size:25px;color:white;}
		.fenlei2{position: absolute;display:none;z-index:1;background:white;background:rgb(250,59,120);font-size:20px;}
		li{overflow:hidden;}
		.fenlei2 a:hover{background:red;color:black;height:30px;}
	</style>
</head>
<body style="padding:50px 0;">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		     <ul class="nav navbar-nav" style="float:right">
		    	<li><a href="">您好欢迎光临凡客诚品!</a></li>
		    	@if(empty(session('id')))
		    	<li><a href="/login/login">登录</a></li>
		    	<li><a href="/login/register">注册</a></li>
		    	@endif
		    	@if(session('id'))
		    	<li><a href="/login/register">个人中心</a></li>
		    	<li><a>{{session('username')}}</a></li>
		    	<li><a href="/login/out">退出</a></li>
		    	@endif
		    </ul>
		</div>
	</nav>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 col-md-offset-1">
				<img src="/homes/img/logo1.png">
			</div>
		</div>
	</div>
	
	<nav class="navbar navbar-default" role="navigation" style="background:rgb(250,59,120);margin-top:10px">
		<div class="row">
	   	<div class="navbar-header col-md-10 col-md-offset-1 zongfenlei" >
	   		<div class="fenlei">
	   			<div class="fenlei1"><a href="/">首页</a></div>
	   		</div>
	   		@foreach($cates as $k=>$v)
	   		<div class="fenlei">
	   			<div class="fenlei1"><a href="/list?id={{$v->id}}">{{$v->name}}</a></div>
	   			<div class="fenlei2">
	   				@foreach($v->sub as $kk=>$vv)
	   				<div><a href="/list?id={{$vv->id}}">{{$vv->name}} ></a>
						<div class="fenlei3">
							@foreach($vv->sub as $kkk=>$vvv)
							<a href="/list?id={{$vvv->id}}">{{$vvv->name}}</a>
							@endforeach
						</div>
	   				</div>
	   				@endforeach
	   			</div>
	   		</div>
	   		@endforeach
	   	</div>
	   	</div>
	</nav>
	
	<div style="width:70%;margin:0 auto">
		<div class="row">
			<div class="col-md-4">
				<ol class="breadcrumb">
				  <li><a href="#">首页</a></li>
				  <li><a href="#">女装</a></li>
				  <li><a href="#">裙装</a></li>
				  <li><a href="#">连衣裙</a></li>
				  <li class="active">衬衫裙</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="goods_t" style="font-size:20px;float:left">{{$info->title}}</div>
				<div style="float:right">
					<span><a href="" id="goumai">购买指南</a></span> |
					<span><a href="" id="xidi">洗涤保养</a></span> |
					<span><a href="">评论</a></span>
				</div>
			</div>	
		</div><hr>
		
		<div class="row">
			<div class="col-md-4 col-md-offset-4 addsuccess" style="display:none">
				<div class="alert alert-info alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	            	加入购物车成功
				</div>
			</div>
		</div>
		

		<div class="row">
			<div class="col-md-4 col-md-offset-4 dologin" style="display:none">
				<div class="alert alert-danger alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	            	您需要登录,才能购买物品哦
				</div>
			</div>
		</div>
	

		<div class="row">
				<div class="row">
			<div class="col-md-4 col-md-offset-1">
				<div class="thumbnail" class="container" >
				    <img style="width:100%;max-height:300px" data-toggle="magnify" src="{{trim($info->pic,'.')}}" alt="">
				</div>
			</div>	
			<div style="text-align:center" class="col-md-6">
				<br><br>
				<div><span id="goods_p" style="color:blue">单价 : </span><span style="color:red">{{$info->price}}元</span></div><br><br>
				<div><span style="color:blue">现有库存 : </span><span id="goods_k" style="color:red">{{$info->num}}件</span></div><br><br>
				<div><span id="goods_n" style="color:blue">选择数量 :</span></div>
				<div class="btn-group-sm">
					<button id="goods_d" type="button" class="btn btn-default"> - </button>
					<input id="goods_num" type="text" value="1" style="width:40px">
					<button id="goods_a" type="button" class="btn btn-default"> + </button>
				</div><br><br>
				<!-- <button type="button" class="btn btn-info">&nbsp;&nbsp;立即购买&nbsp;&nbsp;</button><br><br><br> -->
				<button id="goods_add" type="button" class="btn btn-danger">加入购物车</button>
			</div>
		</div><br><hr>
		
		<div class="row">
			<div class="col-md-12">
				<div id="goods_t" style="font-size:20px;float:left">相关产品</div>
			</div><br><br>
			<div class="col-md-6">
				<div class="thumbnail">
				  	<img src="/homes/img/1-1.jpg" alt="...">
				  	<div class="caption">
				    	<h4>充气的,屌丝专供</h4>
				    	<p>99.8元</p>
				    	
				  	</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="thumbnail">
				  	<img src="/homes/img/1-1.jpg" alt="...">
				  	<div class="caption">
				    	<h4>充气的,屌丝专供</h4>
				    	<p>99.8元</p>
				    	<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
				  	</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="thumbnail">
				  	<img src="/homes/img/1-1.jpg" alt="...">
				  	<div class="caption">
				    	<h4>充气的,屌丝专供</h4>
				    	<p>99.8元</p>
				    	<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
				  	</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="thumbnail">
				  	<img src="/homes/img/1-1.jpg" alt="...">
				  	<div class="caption">
				    	<h4>充气的,屌丝专供</h4>
				    	<p>99.8元</p>
				    	<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
				  	</div>
				</div>
			</div>
		</div><hr>
		
		<div class="row" id="goumai1">
			<div class="col-md-12">
				<div class="thumbnail">
				  	<img src="/homes/img/xinghao1.png" alt="...">
				</div>
			</div>
		</div><br><hr><br><br>

		<div class="row" id="xidi1">
			<div class="col-md-12">
				<div class="thumbnail">
				  	<img src="/homes/img/baoyang.png" alt="...">
				</div>
			</div>
		</div><br><hr><br><br>

		<div ></div>
	</div>
	
	<script type="text/javascript">
		//商品数量的加减
		$('#goods_d').click(function(){
			var num = parseInt($('#goods_num').val());
			num = num - 1;
			if(num == 0) return;
			$('#goods_num').val(num);
		});
		$('#goods_a').click(function(){
			var num = parseInt($('#goods_num').val());
			num = num + 1;
			$('#goods_num').val(num);
		});
	
		//使用ajax添加购物车商品
		$('#goods_add').click(function(){
			var id = {{$info->id}};
			var num = $('#goods_num').val();
			//发送ajax请求  设置配置token
			$.ajaxSetup({
				headers:{
					'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
				}
			});
			$.post("{{url('/info/insert')}}",{id:id,num:num},function(data){
				if(data == 1){
					$('.addsuccess').show(1000);
					setTimeout(function(){
						$('.addsuccess').hide(1000);
					},2000);
				}else if(data == 2){
					$('.dologin').show(1000);
					setTimeout(function(){
						$('.dologin').hide(1000);
					},2000);
				}
			});
		});

		//购买指南
		$('#goumai').click(function(){
			$('html,body').animate({scrollTop:$('#goumai1').offset().top-200},1000);
			return false;
		});
		$('#xidi').click(function(){
			$('html,body').animate({scrollTop:$('#xidi1').offset().top-300},1000)
			return false;
		});
	</script>
	
</body>
</html>