@extends('layout.homecart')
@section('content')
<!--导入插件-->
<script type="text/javascript" src="/homes/location/jquery.js"></script>
<script type="text/javascript" src="/homes/location/area.js"></script>
<script type="text/javascript" src="/homes/location/location.js"></script>
	<div class="container">
		<div class="row" style="height:40px;font-size:18px;">
			<div class="col-md-3">
				<div style="background:gray;text-align:center;">1丶我的购物车</div>
	        </div>
	        <div class="col-md-1" style="text-align:center;">
	        	<span style="color:yellow;margin:2px 2px"class="glyphicon glyphicon-arrow-right"></span>
	        </div>
	        <div class="col-md-3">
				<div style="background:pink;text-align:center;">2丶填写核对订单</div>
	        </div>
	        <div class="col-md-1" style="text-align:center;">
	        	<span style="color:yellow;margin:2px 2px"class="glyphicon glyphicon-arrow-right"></span>
	        </div>
	        <div class="col-md-3">
				<div style="background:gray;text-align:center;">3丶成功提交订单</div>
	        </div>
		</div><br>
		
		<div style="font-size:20px">填写并核对订单信息</div><hr>

		<div class="panel panel-success">
		 	<div class="panel-heading">收货人信息
		 		<div style="float:right">
					<button type="button" data-toggle="modal" data-target="#myModal">
				  	添加地址
					</button>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  	<div class="modal-dialog" role="document">
					    <div class="modal-content">
					    	<form class="address" action="/order/address" method="post">
						      	<div class="modal-header">
						        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        	<h4 class="modal-title" id="myModalLabel">添加地址</h4>
						      	</div>
						      	<div class="modal-body" style="text-align:center">
						        	收&nbsp;&nbsp;件&nbsp;&nbsp;人:<input type="text" name="name" style="width:300px"><hr>
						        	手机号码:<input type="text" name="phone" style="width:300px"><hr>
						        	<!--层级联动选择框-->
					        		选择地址:<select id="loc_province" class="" name="sheng" style="width:90px;"></select>
					        		<select id="loc_city" class="" name="shi" style="width:100px;"></select>
					        		<select id="loc_town" class="" name="xian" style="width:100px;"></select><hr>
						        	街道村镇:<input type="text" name="address" style="width:300px">
						      	</div>
						      	<div class="modal-footer">
						        	<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
						        	<button class="btn btn-primary">添加</button>
						      	</div>
						      	<input type="hidden" name="ssx" id="">
						      	{{csrf_field()}}
					      	</form>
					    </div>
					  	</div>
					</div>
				</div>
		 	</div>
		  	<div class="panel-body">
	<form action="/pay" method="post">
		    	<div class="row" style="padding:0 20px">
		    		@foreach($address as $k => $v)
		    		<div class="col-md-5" style="margin:0 0 10px 50px">
		    			<div sid="{{$v->id}}" class="panel panel-success isdefault" style="
		    				@if($v->isdefault==1)
		    				background:rgb(219,234,249);
							@endif
		    				padding:5px;margin-bottom:5px">
			    			<div>收件人:{{$v->name}}</div>
			    			<div>手机号码:{{$v->phone}}</div>
			    			<div>收货地址:{{$v->ssx}}{{$v->address}}</div>
		    			</div>
		    			<div style="color:red;text-align:center"><a href="">删除地址</a></div>
		    		</div>
		    		@if($v->isdefault)
					<input type="hidden" name="address" id="updateaddress" value="{{$v->id}}">
		    		@endif
		    		@endforeach
		    	</div>
		  	</div>
		</div>
		<div></div>
		
		
		<div class="panel panel-warning">
		 	<div class="panel-heading">所选商品</div>
		  	<div class="panel-body" style="padding:0 50px">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>商品名称</th>
                                <th>单价</th>
                                <th>数量</th>
                                <th>小计</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($info as $k => $v)
                            <tr>
                                <td style="width:300px">
                                	<div style="float:left;margin-right:30px">{{$v->title}}</div>
                                	<div style="width:100px;height:100px;float:left"><img src="{{$v->pic}}" style="width:100%;height:100%"></div>
                                </td>
                                <td>{{$v->price}}</td>
                                <td>{{$v->num}}</td>
                                <td>{{$v->price * $v->num}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
	
		<div class="panel panel-info">
		 	<div class="panel-heading">支付方式</div>
		  	<div class="panel-body">
		  		<div><input type="radio" name="pay" checked value="dao">货到付款</div>
		  		<div><input type="radio" name="pay" value="yinlian">银行卡</div>
		  		<div><input type="radio" name="pay" value="bao">支付宝</div>
		  	</div>
		</div>
		
		<div>
			<div style="float:right">
				<a href="/cart"><button type="button" class="btn btn-info"><< 返回购物车</button></a>
				<button style="margin-left:10px" class="btn btn-danger">支付 >></button>
			</div>
		</div>
		<div style="float:right;margin-right:50px">
			<span style="font-size:25px;color:red">商品总计:{{$zprice}}</span><span class="glyphicon glyphicon-usd" style="font-size:25px;color:red"></span>
		</div>
		{{csrf_field()}}
	</form>	

	<br><br><hr>
	</div>

<script type="text/javascript">
	$(document).ready(function() {
		showLocation();
		$('#addresses .attr').each(function(){
			var str = $(this).attr('attr');
			var info = getInfo(str);
			$(this).html(info);
		});

		//定义获取城市信息方法
		function getInfo(str){
			//console.log(str);
			//拆分字符串
			var arr = str.split(',');
			// console.log(arr);	
			var ls  = new Location;
			var l = ls.items;
			// console.log(l['0,1,2']['5']);
			var sheng = l['0'][arr[0]];
			var shi = l['0,'+arr[0]][arr[1]];
			var xian = l['0,'+arr[0]+','+arr[1]][arr[2]];
			return sheng+shi+xian;
		}

		//地址操作 表单提交时获取详细省市县
		$('.address').submit(function(){
			var sheng = $('#loc_province').val();
			var shi = $('#loc_city').val();
			var xian = $('#loc_town').val();
			var str = sheng+','+shi+','+xian;
			var str = getInfo(str);
			$(this).find('input[name=ssx]').val(str);
		});

		$('.isdefault').click(function(){
			$(this).css('background','rgb(219,234,249)');
			$(this).parent().siblings().find('.isdefault').css('background','');
			var id = $(this).attr('sid')
			$('#updateaddress').val(id);
		});
	});

	
</script>
@endsection