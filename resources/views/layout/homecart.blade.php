<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>购物车</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="/homes/css/bootstrap.min.css">
	<link rel="stylesheet" href="/homes/css/bootstrap-theme.min.css">
	<script src="/homes/js/jquery-1.11.3.min.js"></script>
	<script src="/homes/js/bootstrap.min.js"></script>
</head>
<body style="padding:20px">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="height:30px"> 
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav" style="float:right">
		    	<li><a href="/">首页</a></li>
		    	<li><a href="">您好欢迎光临凡客诚品!</a></li>
		    	@if(empty(session('id')))
		    	<li><a href="/login/login">登录</a></li>
		    	<li><a href="/login/register">注册</a></li>
		    	@endif
		    	@if(session('id'))
		    	<li><a href="/merbers">个人中心</a></li>
		    	<li><a>{{session('username')}}</a></li>
		    	<li><a href="/login/out">退出</a></li>
		    	@endif
		    </ul>
		</div>
	</nav>
	<!-- <div class="container-fluid"> -->
	<div class="container" style="margin-top:50px">
		<div class="row">
			<div class="col-md-6">
				<img src="/homes/img/logo.png" alt="">
			</div>
			<div class="col-md-6">
	            <p style="margin:30px 30px 0 0;text-align:right;font-size:20px">
	            	<a href="/cart"><span style="color:#d9534f" class="glyphicon glyphicon-shopping-cart" id="span3">我的购物车</span></a>
	            </p>
	        </div>
		</div><hr>
	</div>
	
	@section('content')
	
	@show
	<footer class="footer ">
	  <div class="container">
	    <div class="row footer-top">
	      <div class="col-sm-6 col-lg-6">
	        <h4>
	          <!-- <img src="http://static.bootcss.com/www/assets/img/logo.png"> -->
	        </h4>
	        <p>本网站所列开源项目的中文版文档全部由<a href="http://www.bootcss.com/">Bootstrap中文网</a>成员翻译整理，并全部遵循 <a target="_blank" href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>协议发布。</p>
	      </div>
	      <div class="col-sm-6  col-lg-5 col-lg-offset-1">
	        <div class="row about">
	          <div class="col-xs-3">
	            <h4>关于</h4>
	            <ul class="list-unstyled">
	              <li><a href="/about/">关于我们</a></li>
	              <li><a href="/ad/">广告合作</a></li>
	              <li><a href="/links/">友情链接</a></li>
	              <li><a href="/hr/">招聘</a></li>
	            </ul>
	          </div>
	          <div class="col-xs-3">
	            <h4>联系方式</h4>
	            <ul class="list-unstyled">
	              <li><a target="_blank" title="Bootstrap中文网官方微博" href="http://weibo.com/bootcss">新浪微博</a></li>
	              <li><a href="mailto:admin@bootcss.com">电子邮件</a></li>
	            </ul>
	          </div>
	          <div class="col-xs-3">
	            <h4>旗下网站</h4>
	            <ul class="list-unstyled">
	              <li><a target="_blank" href="http://www.golaravel.com/">Laravel中文网</a></li>
	              <li><a target="_blank" href="http://www.ghostchina.com/">Ghost中国</a></li>
	            </ul>
	          </div>
	          <div class="col-xs-3">
	            <h4>赞助商</h4>
	            <ul class="list-unstyled">
	              <li><a target="_blank" href="http://www.ucloud.cn/">UCloud</a></li>
	              <li><a target="_blank" href="https://www.upyun.com">又拍云</a></li>
	            </ul>
	          </div>
	        </div>
	      </div>
	    </div>
	    <hr>
	    <div class="row footer-bottom">
	      <ul class="list-inline text-center">
	        <li><a target="_blank" href="http://www.miibeian.gov.cn/">京ICP备11008151号</a></li><li>京公网安备11010802014853</li>
	      </ul>
	    </div>
	  </div>
	</footer>
</body>
</html>