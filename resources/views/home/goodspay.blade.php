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
				<div style="background:gray;text-align:center;">2丶填写核对订单</div>
	        </div>
	        <div class="col-md-1" style="text-align:center;">
	        	<span style="color:yellow;margin:2px 2px"class="glyphicon glyphicon-arrow-right"></span>
	        </div>
	        <div class="col-md-3">
				<div style="background:pink;text-align:center;">3丶成功提交订单</div>
	        </div>
		</div><br>

		<div class="row" style="height:200px;padding-top:50px">
			<div class="col md-4 col-md-offset-4">
				@if(session("seccess"))
					<div class="alert alert-danger alert-dismissable">
	 					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	                    {{session("seccess")}}
					</div>
				@endif
			</div>
			<div class="col-md-2 col-md-offset-5">
				<form action="/pay/paysuccess" method="post" class="form-horizontal" role="form">
			      	<div class="form-group">
		            	<input class="form-control input-lg" type="text" placeholder="请书写六位密码">
		         	</div>
		         	<div class="form-group">
		            	<button class="btn btn-primary" style="width:100%">支付</button>
		         	</div>
		         	<input type="hidden" name="id" value="{{$id}}">
		         	{{csrf_field()}}
				</form>
			</div>
		</div>
	</div>	
	
@endsection