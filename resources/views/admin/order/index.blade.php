@extends('layout.index')
@section('title','商品订单列表')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading"></div>
		<div class="panel-body">
	        <div class="dataTable_wrapper">
	            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
	            	<div class="row">
        				@if(session("error"))
        					<div class="alert alert-danger alert-dismissable">
		     					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		                        {{session("error")}}
							</div>
        				@endif
        				@if(session("success"))
        					<div class="alert alert-info alert-dismissable">
		     					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		                        {{session("success")}}
							</div>
        				@endif
        				<form action="/admin/orders" method="get">
		            		<div class="col-sm-6">
		            		<div class="dataTables_length" id="dataTables-example_length">
			            		<label>每页 
			            			<select name="num" aria-controls="dataTables-example" class="form-control input-sm">
				            			<option value="10" 
											@if(!empty($request['num']) && $request['num'] == 10)
												selected
											@endif
				            			>10</option>
				            			<option value="25" 
											@if(!empty($request['num']) && $request['num'] == 25)
												selected
											@endif
				            			>25</option>
				            			<option value="50" 
											@if(!empty($request['num']) && $request['num'] == 50)
												selected
											@endif
				            			>50</option>
				            			<option value="100" 
				            				@if(!empty($request['num']) && $request['num'] == 100)
				            					selected
				            				@endif
				            			>100</option>
			            			</select> 条
			            		</label>
		            		</div>
		            		</div>
			        		<div class="col-sm-6">
			        		<div id="dataTables-example_filter" class="dataTables_filter">
			        			<label> 订单号 : 
			        				<input 
										@if(!empty($request['keywords']))
											value="{{$request['keywords']}}"
										@endif
			        				name="keywords" type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-example">
			        			</label>
			        			<button class="btn btn-info">搜索</button>
			        		</div>
			        		</div>
		        		</form>
	        		</div>
        		<div class="row">
        			<div class="col-sm-12">
        				<table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dataTables-example_info">
			                <thead>

			                    <tr role="row">
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="Browser: activate to sort column ascending">ID</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="Browser: activate to sort column ascending">订单号</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="CSS grade: activate to sort column ascending">总价</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="CSS grade: activate to sort column ascending">下单时间</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="CSS grade: activate to sort column ascending">状态</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  style="width:200px">操作</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	@foreach($order as $k => $v)
			                	<tr class="gradeA odd" role="row">
			                        <td class="sorting_1">{{$v->id}}</td>
			                        <td class="sorting_1">{{$v->ordernum}}</td>
			                        <td class="sorting_1">{{$v->zprice}} 元</td>
			                        <td class="sorting_1">{{date('Y-m-d H:i:s',$v->time)}}</td>
			                        <td class="sorting_1">
			                        	@if($v->status == 1)
											已支付
										@endif
			                        </td>
			                        <td class="sorting_1">
										<a href="/admin/orders/info?id={{$v->id}}"><button class="btn btn-info" type="button">查看</button></a>
										<button class="btn btn-warning" type="button">发货</button>
			                        	<a href="/admin/orders/delete?id={{$v->id}}"><button class="btn btn-danger" type="button">删除</button></a>
			                        </td>
			                    </tr>
			                    @endforeach
			                </tbody>

            			</table>
            		</div>
            	</div>	
        	</div>
    	</div>
	</div>
</div>

@endsection