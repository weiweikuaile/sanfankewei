<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="/homes/css/bootstrap.min.css">   
	<link rel="stylesheet" href="/homes/css/bootstrap-theme.min.css">
	<script src="/homes/js/jquery-1.11.3.min.js"></script>
	<script src="/homes/js/bootstrap.min.js"></script>
	<style>
	/*	#zonglei{height:50px;margin-bottom:15px;}*/
		.fenlei{float:left;width:10%;}
		.fenlei1{margin-top:5px;font-size:25px;color:white;}
		.fenlei2{position: absolute;display:none;z-index:1;background:white;background:rgb(250,59,120);font-size:20px;}
		li{overflow:hidden;}
		.fenlei2 a:hover{background:red;color:black;height:30px;}

		#rcorners3 {
		    border-radius: 25px;
		    background: url(/images/paper.gif);
		    background-position: left top;
		    background-repeat: repeat;
		    margin:0 50px;
		    padding: 15px; 
		    width: 200px;
		    height: 150px;    
		}
	</style>
</head>
<body style="padding-top:50px">

	<!-- 导航 -->
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="height:30px"> 
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav" style="float:right">
		    	<li><a href="">您好欢迎光临凡客诚品!</a></li>
		    	@if(empty(session('id')))
		    	<li><a href="/login/login">登录</a></li>
		    	<li><a href="/login/register">注册</a></li>
		    	@endif
		    	@if(session('id'))
		    	<li><a href="/members">个人中心</a></li>
		    	<li><a href=""><span style="color:#d9534f" class="glyphicon glyphicon-shopping-cart" id="span3">我的购物车</span></a></li>
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
	
	@section('content')
	@show
	
	<!-- 巨幕 -->
	<div class="jumbotron" style="text-align:center;color:red;background:#f369;border-radius:20px">
	
		  <h1>丨 你 的 选 择 , 尽 在 凡 客 丨</h1>
		  <p></p>
	</div><hr>
	
	<!-- 尾部 -->
	<!-- 于爽之前的<footer class="footer ">
	  <div class="container">
	    <div class="row footer-top">
	      <div class="col-sm-6 col-lg-6">
	        <h4>
	          <img src="http://static.bootcss.com/www/assets/img/logo.png">
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
	</footer> -->
	<!-- old footer尾部 -->
	<!-- new footer尾部 -->
	<div class="container" style="width:90%">
		<div id="footer" class="row" style="center">
		   	<div id="rcorners3" class="col-sm-6 col-md-3">		
		        <div class="row clearfix">
		      	@foreach($links as $k=>$v)
		        <div class="col-md-12 column">
		         	<a href="{{$v->url}}" class="thumbnail">
		               <!-- <img src="/wp-content/uploads/2014/06/kittens.jpg" alt="通用的占位符缩略图">网站图片linkpic -->
		                <img src="{{$v->pic}}" alt="">
		            </a>
		            <div width="60"><a href="{{$v->url}}" target="_blank">{{$v->name}}</a></div> 
		        </div>
		        @endforeach
		        </div>
		   	</div>
		   	<div id="rcorners3" class="col-sm-6 col-md-3">	
		        <div class="row clearfix">
		      	@foreach($links as $k=>$v)
		        	<div class="col-md-12 column">
		         	<a href="{{$v->url}}" class="thumbnail">
		               <!-- <img src="/wp-content/uploads/2014/06/kittens.jpg" alt="通用的占位符缩略图">网站图片linkpic -->
		               <img src="{{$v->pic}}" alt="">
		            </a>
		            <div width="60"><a href="{{$v->url}}" target="">{{$v->name}}</a></div> 
		        	</div>
		          @endforeach   
		    	</div>
		   	</div>
		   	<div id="rcorners3" class="col-sm-6 col-md-3">	
		        <div class="row clearfix">
		      	@foreach($links as $k=>$v)
		        	<div class="col-md-12 column">
		         	<a href="{{$v->url}}" class="thumbnail">
		               <!-- <img src="/wp-content/uploads/2014/06/kittens.jpg" alt="通用的占位符缩略图">网站图片linkpic -->
		                <img src="{{$v->pic}}" alt="">
		            </a>
		            <div width="60"><a href="{{$v->url}}" target="_blank">{{$v->name}}</a></div> 
		        	</div>
		          @endforeach   
		    	</div>
		   	</div>
		   	<div id="rcorners3" class="col-sm-6 col-md-3">
		   		
		      	<div class="row clearfix">
		      	@foreach($links as $k=>$v)
			        <div class="col-md-12 column">
			         	<a href="{{$v->url}}" class="thumbnail">
			               <!-- <img src="/wp-content/uploads/2014/06/kittens.jpg" alt="通用的占位符缩略图">网站图片linkpic -->
			               <img src="{{$v->pic}}" alt="">
			            </a>
			            <div width="60"><a href="{{$v->url}}" target="">{{$v->name}}</a></div> 
			        </div>
		        @endforeach
		         
		      	</div>
		   	</div>
		</div>	   
	</div>
	<!-- new footer尾部end -->

	<script src="/admins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/admins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/admins/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="/admins/dist/js/sb-admin-2.js"></script>
    <script src="/admins/layer/layer.js"></script>
    <script type="text/javascript">
		$('.fenlei1').hover(function(){
			$(this).siblings().css({display:'block'});
		},function(){
			$(this).siblings().css({display:'none'});
		})
		$('.fenlei2').hover(function(){
			$(this).css({display:'block'});
		},function(){
			$(this).css({display:'none'});
		})
	</script>
   

	
</body>
</html>