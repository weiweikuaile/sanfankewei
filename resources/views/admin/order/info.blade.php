@extends('layout.index')
@section('title','商品订单详情')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">单号 : {{$order->ordernum}}</div>
		<div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover col-md-8">
                    <tbody>
                    	<tr>
                    		<td>收件人 : {{$address->name}}</td>
                    		<td>购买者 : {{$username}}</td>
                    	</tr>
                
                        <tr>
                        	<td>收货地址 : {{$address->ssx.$address->address}}</td>
                        	<td>联系方式 : {{$address->phone}}</td>
                        </tr>
                        <tr>
                        	<td>总价 : {{$order->zprice}}</td><td></td>
                        </tr>
                        <tr><td></td><td></td></tr>
                    	@foreach($goodsinfo as $k => $v)
                        <tr>
                            <td style="width:200px">{{$v->title}}</td>
                            <td style="width:200px"><img src="{{$v->pic}}" style="width:80px;height:60px"></td>
                            <td>单价 : {{$v->price}}</td>
                            <td>购买数量 : {{$v->num}}</td>
                            <td>小计 : {{$v->price*$v->num}}</td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
			
			
			
			
			
        </div>
	</div>
</div>

@endsection