<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="/homes/css/bootstrap.min.css">
	<link rel="stylesheet" href="/homes/css/bootstrap-fangdajing.css">
	<link rel="stylesheet" href="/homes/css/bootstrap-theme.min.css">
	<script src="/homes/js/jquery-1.11.3.min.js"></script>
	<script src="/homes/js/bootstrap.min.js"></script>
	<script src="/homes/js/bootstrap-fangdajing.js"></script>
	<style>
		#zonglei{height:50px;margin-bottom:15px;}
		.fenlei{float:left;width:20%;text-align:center;}
		.fenlei ul{position: absolute;display:none;z-index:1;background:#f39;}
		.fenlei div{font-size:25px;}
		li{overflow:hidden;}
	</style>
</head>
<body style="padding:50px 0;">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav" style="float:right">
		    	<li><a href="">您好欢迎光临凡客诚品!</a></li>
		    	<li><a href="">登录</a></li>
		    	<li><a href="">|</a></li>
		    	<li><a href="">注册</a></li>
		    	<li><a href="{{url('/members/index')}}">个人中心</a></li>
		    	<li><a href="">我的订单</a></li>
		    	<li><a href=""><span style="color:#d9534f" class="glyphicon glyphicon-shopping-cart" id="span3">我的购物车</span></a></li>
		    </ul>
		</div>
	</nav><br><br>
	@section('content')
		<div style="width:70%;margin:0 auto">
			<ul class="nav nav-pills">
			   <li class="active"><a href="{{url('/members/index')}}">个人信息</a></li>
			   <li class="active"><a href="{{url('/members/edit')}}">信息修改</a></li>
			   <li class="active"><a href="{{url('/members/safe')}}">安全中心</a></li>	   
			   <li class="active"><a href="{{url('/members/collection')}}">个人收藏</a></li>
			   <li class="active"><a href="{{url('/members/history')}}">历史记录</a></li>  
			</ul>
		
    @show                 
 

    </div>
	@section("myjs")
	@show
</body>
</html>