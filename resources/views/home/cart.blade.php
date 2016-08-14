@extends('layout.homecart')
@section('content')
	<div class="container">
		<div class="row" style="height:40px;font-size:18px;">
			<div class="col-md-3">
				<div style="background:pink;text-align:center;">1丶我的购物车</div>
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
				<div style="background:gray;text-align:center;">3丶成功提交订单</div>
	        </div>
		</div>
		
		<!-- @if(session('error'))
		<div class="row">
			<div class="col-md-4 col-md-offset-4 addsuccess">
				<div class="alert alert-info alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	            	{{session('error')}}
				</div>
			</div>
		</div>
		@endif -->

		@if(isset($kong))
		<div class="row">
			<br>
			<div class="col-md-12" style="text-align:center;margin-top:150px">
				你的购物车中没有商品丶请您先 <a href="/">选购商品</a>
	        </div>
		</div>
		@endif

		@if(isset($info))
		@if(session('error'))
		<div class="row">
			<div class="col-md-4 col-md-offset-4 addsuccess">
				<div class="alert alert-info alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	            	{{session('error')}}
				</div>
			</div>
		</div>
		@endif
		<div class="row" style="margin-top:50px">
			<div class="col-md-12" style="font-size:25px">
				<span class="glyphicon glyphicon-shopping-cart" style="color:red"></span>&nbsp;我的购物车
	        </div>
			<div class="col-md-12">
				<span style="color:red">温馨提示</span>：1.选购清单中的商品无法保留库存，请您及时结算。2.商品的价格和库存将以订单提交时为准。
	        </div>
		</div><br><br>
		
		<form action="/order" method="get">
			<div class="table-responsive">
				<table class="table table-bordered">
				    <thead>
				     	<tr>
					      	 <th></th>
					         <th>商品名称</th>
					         <th>单价</th>
					         <th>数量</th>
					         <th>小计</th>
					         <th>操作</th>
				        </tr>
				    </thead>
				   @foreach($info as $k => $v)
				   <tbody>
					    <tr>
					      	 <td style="text-align:center"><input class="xuan" type="checkbox" name="info[]" value="{{$v->id}}"></td>
					         <td style="width:300px">
					         	<div style="float:left;margin-right:30px">{{$v->title}}</div>
					         	<div style="width:100px;height:100px;float:left;"><img src="{{$v->pic}}" style="width:100%;height:100%"></div>
					         </td>
					         <td>{{$v->price}}</td>
					         <td>{{$v->num}}</td>
					         <td>{{$v->price * $v->num}}</td>
					         <td style="width:80px">
					         	<input type="hidden" value="{{$v->id}}">
					         	<button type="button" class="btn btn-danger deletecart">删除</button>
					         </td>
					    </tr>
				   </tbody>
				   @endforeach
				   <tbody>
				</table>
				<div>
					<button type="button" class="btn btn-info quan">全选</button>
					<button type="button" class="btn btn-info qing">清空购物车</button>
				</div>
			</div><br><br><br>
			<div style="float:right">
				<a href="/"><button type="button" class="btn btn-info"><< 继续购物</button></a>
				<button class="btn btn-danger">去结算 >></button>
			</div>
		</form>

		<script type="text/javascript">
			$('.quan').click(function(){
				$('.xuan').attr("checked",true);
			});
			
			//ajax删除购物车
			$('.deletecart').click(function(){
				var id = $(this).prev().val();
				var btn = $(this);
				$.get("{{url('/cart/delete')}}",{id:id},function(data){
					if(data == 1){
						btn.parent().parent().hide(1000);
					}else{
						alert('删除失败');
					}
				});
			});
		</script>
		@endif
		<br><br><br><hr>
	</div>
@endsection