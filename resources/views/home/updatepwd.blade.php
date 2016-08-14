<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{csrf_token()}}">
		<link rel="stylesheet" href="/homes/css/bootstrap.min.css">
		<link rel="stylesheet" href="/homes/css/bootstrap-theme.min.css">
		<script src="/homes/js/jquery-1.11.3.min.js"></script>
		<script src="/homes/js/bootstrap.min.js"></script>
		<title></title>
	<style>
		*{
			margin:0px;
			padding:0px;

		}
	</style>

	</head>
	<body>
		<div class="d">
			<div class="d3">
				
				<div id="d2">
					<ul>
						<li><a href="{{url('/')}}"><font color="white" size="3"><b>首页</b></font></a></li>
					</ul>
				</div>
				@if(session('error'))
					<div class="alert alert-danger">
						<ul>
						    <li>{{session('error')}}</li>
						</ul>
					</div>
        		@endif
			</div>
			<div class="d5">
				<div id="d8">
					
				<font size="3" color="#E45050"><b>修改密码</b></font>&nbsp
			
				<form action="/login/doupdatepwd" method="post" >
						
						<div class="mm"></div>
						<span>*</span>新密码：&nbsp;&nbsp;<input id="password" type="password" required name="password" placeholder="长度在6~18之间" /><br><br>				
						<div class="mm"></div>	
						<span>*</span>确认密码：<input id="repassword" style="width: 200px" type="password" required name="repassword" placeholder="请再次输入，两次密码必须一致"/><br><br>
						<input type="hidden" name="email" value="{{$email}}">
					<input type="submit" value="确认提交">
					{{csrf_field()}}
				</form>
							<div id="d10"></div>
					
					
				</div>
			</div>
			
		</div>
	</body>
</html>