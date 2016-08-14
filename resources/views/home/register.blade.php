<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>前台新用户注册</title>
        <link rel="stylesheet" href="/homes/css/register.css">
        <link rel="stylesheet" href="/homes/css/bootstrap.min.css">
		<link rel="stylesheet" href="/homes/css/bootstrap-theme.min.css">
		<script src="/homes/js/jquery-1.11.3.min.js"></script>
		<script src="/homes/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="passport-page yoho-page clearfix">
        <!-- <div class="passport-cover">
                <div class="cover-content">
                    <img class="cover-img" src="./dist/img/555.jpg">
                </div>
            </div>     -->    
        <div class="content">
        	<!---->
        	<div class="container">
        		<div class="row">
        			<div class="col-md-4 col-md-offset-4">
        				@if(session('error'))
						<div class="alert alert-danger">
						        <ul>
						        	<li>{{session('error')}}</li>
						        </ul>
						</div>
        				@endif
						@if (count($errors) > 0)
						    <div class="alert alert-danger">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
						@endif
						<form action="/login/doregister" method="post">
						  <div class="form-group">
						    <label for="exampleInputEmail1">邮箱</label>
						    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">密码</label>
						    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						  </div>
						 <div class="form-group">
						   <label for="exampleInputPassword1">验证码</label>
						   <input type="text"  id="vcode" name="vcode" readmin="验证码错误" class="form-control"style="width:100px" placeholder="vcode"><span id="s"></span>
						 	<br>
						 	<div style="width:50px;height:50px;float:left;">
						 		<img src="/login/vcode" onclick="this.src=this.src+'?a=1'" style="cursor:pointer;" alt="">
						 	</div>
						 </div>
						  <br><br>
						 
						  <div class="checkbox">
						    <label>
						      <input type="checkbox"> 已阅读凡客诚品服务条款
						    </label>
						  </div>
							{{csrf_field()}}
						  <button type="submit" class="btn btn-default">注册</button>
						</form>
					</div>
				</div>
			</div>
        	<!---->
        </div>
       	<script type="text/javascript">
    //     		$('form').submit(function(){
    //     			//阻止默认行为
    //     			return false;
    //     		})

         		$('#vcode').blur(function(){//kejianjquery03/1.htmlvedio1
        			//alert(333);
				 	var vvcode=$('input[name=vcode]').val();
				// 	//alert(vvcode);
				 	var text = $('#vcode');//获取属性 提示信息
				 	//设置ajax全局配置
				 	$.ajaxSetup({
				 	    headers: {
				 	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				 	    },
				// 	    async:false
				 	});

				 	//发送ajax post请求
		         	$.post('{{url("/login/vvcode")}}',{verify:vvcode},function(data){
		             	//console.log(data);
		            	//alert(data);
		                 if(data == "1"){
		                 	//$('#s').css('border','1px solid green');
		                 	text.next().html('√').css('color','green');
		                     //alert('验证码正确');
		                 }else{
		                 	text.next().html('×验证码错误').css('color','red');
		                 	//$('#s').css('border','1px solid red');
		                 	//alert('验证码错误');
		                 }
		             });


				 })
        	</script>
    </div>
</body>
</html>