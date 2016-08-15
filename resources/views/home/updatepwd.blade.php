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
					
				<font size="3" color="#E45050"><b>修改密码</b></font>&nbsp;
			
				<form action="/login/doupdatepwd" method="post" >
						
					<div class="mm"></div>
					<span>*</span>新密码：&nbsp;&nbsp;<input type="password"  name="password" readmin="长度在6~18之间" placeholder="长度在6~18之间"/><span></span><br><br>				
					<div class="mm"></div>
					<br>
					<span>*</span>确认密码：<input style="width: 200px" type="password"  name="repassword" readmin="请再次输入，两次密码必须一致" placeholder="请再次输入，两次密码必须一致"/><span></span><br><br>
					<input type="hidden" name="email" value="{{$email}}"> 
					<input type="submit" value="确认提交">
					{{csrf_field()}}

				</form>
					<div id="d10"></div>
					
					
				</div>
			</div>
			
		</div>
		<script type="text/javascript">
		//声明全局变量
		var CPASS = false;
		var CREPASS = false;
		//绑定表单事件
		$('form').submit(function(){
			//触发丧失焦点事件
			$('input').trigger('blur');
			//检测所有字段是否正确
			if(CPASS && CREPASS){
				//提交
				return true;
			}
			//阻止默认行为
			return false;
		})

		$('input').focus(function(){
			var str=$(this).attr('readmin');
			$(this).next().html(str).css('color','green');
			$(this).css('border','1px solid green');
		})
		//绑定丧失焦点事件//密码
		$('input[name=password]').blur(function(){
			var reg = /^\w{6,18}$/;
			var password=$(this).val();
			var res=reg.test(password);
			if(res){
				$(this).css('border','1px solid green');
				$(this).next().html('√').css('color','green');
				CPASS=true;
			}else{
				$(this).next().html('密码格式不正确').css('color','red');
				$(this).css('border','1px solid red');
				CPASS=false;
			}
		})
		//确认密码
		$('input[name=repassword]').blur(function(){
			var repassword=$(this).val();
			var password=$('input[name=password]').val();
			if(repassword == ''){
				$(this).css('border','1px solid red');
				$(this).next().html('确认密码必须填写').css('color','red');
				CREPASS=false;
				return false;
			}
			//验证
			if(repassword == password){
				$(this).css('border','1px solid green');
				$(this).next().html('√').css('color','green');
				CREPASS = true;
			}else{
				$(this).css('border','1px solid red');
				$(this).next().html('两次密码不一致').css('color','red');
				CREPASS = false;
			}

		})

		</script>
	</body>
</html>