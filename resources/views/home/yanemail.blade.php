<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{csrf_token()}}">
		<title></title>
		<link rel="stylesheet" href="/homes/css/findpwd/ucenter.css">
		<link rel="stylesheet" href="/homes/css/findpwd/common.css">
		<link rel="stylesheet" href="/homes/css/bootstrap.min.css">
		<link rel="stylesheet" href="/homes/css/bootstrap-theme.min.css">
		<script src="/homes/js/jquery-1.11.3.min.js"></script>
		<script src="/homes/js/bootstrap.min.js"></script>
	</head>
	
	<body bgcolor="#EDEDED">
		<div id="ucnav">
			<div id="ucnav1">
				<div id="ucnav2">
					<img src="#" width="165" height="58">	
				</div>
				<div id="ucnav3">
					<div id="wodejd"></div>
					<div id="fanhuijd"><a href="/"><font color="white">返回凡客首页</font></a></div>	
				</div>
				<div id="shouye"><a href="/"><font color="white">首页</font></a></div>
			</div>
		</div>
		<div id="main">
			<div id="shezhi">
				<div class="shezhicell"><b>找回密码</b></div>
			</div>
			@if(session('error'))
				<div class="alert alert-danger">
					<ul>
						<li>{{session('error')}}</li>
					</ul>
				</div>
        	@endif
		
			<div id="mibaowenti">
				<br>
				<span>填写您的邮箱名</span>
				<!-- <form action="./doaction.php?act=submituser" method="post"> -->
				<!-- <form action="/doyanemail" method="post">-->
					邮箱名：<input type="text" name="email"><br><br>
					<input id="email" type="submit" value="提交" style="width:70px">
					
				<!--</form>-->
			
			</div>
			<script type="text/javascript">
        		$('#email').click(function(){
        			//alert(333);
					var email=$('input[name=email]').val();
					//alert(email);
					
					//设置ajax全局配置
					$.ajaxSetup({
					    headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});

					//发送ajax post请求
		        	$.post('{{url("/login/doyanemail")}}',{email:email},function(data){
		            	// alert(data)
		            	//console.log(verify);
		                if(data == "1"){
		                    //alert('邮箱名正确');
							 window.location = '/login/successpwd';
		                }else{
		                	alert('邮箱名错误');
		                }
		            });


				})
        	</script>
	</body>
</html>