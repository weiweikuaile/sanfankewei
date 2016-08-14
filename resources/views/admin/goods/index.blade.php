@extends('layout.index')
@section('title','商品添加')
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
    			<form action="/admin/goods" method="get">
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
	        			<label> 关键字 : 
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
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="Browser: activate to sort column ascending">商品名称</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">商品类别</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="Engine version: activate to sort column ascending">商品单价</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="CSS grade: activate to sort column ascending">商品库存</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="CSS grade: activate to sort column ascending">商品图片</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="CSS grade: activate to sort column ascending">商品状态</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="CSS grade: activate to sort column ascending">操作</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	@foreach($goods as $k => $v)
			                	<tr class="gradeA odd" role="row">
			                        <td class="sorting_1">{{$v->id}}</td>
			                        <td class="sorting_1">{{$v->title}}</td>
			                        <td class="sorting_1">{{$v->cid}}</td>
			                        <td class="sorting_1">{{$v->price}}</td>
			                        <td class="sorting_1">{{$v->num}}</td>
			                        <td class="sorting_1">{{$v->pic}}</td>
			                        <!-- <td class="sorting_1"><img src="{{$v->pic}}" alt=""></td> -->
			                        <td class="sorting_1">{{$v->status}}</td>
			                        <td class="sorting_1">
			                        	<a href="{{url('/admin/goods/delete')}}?id={{$v->id}}"><button class="btn btn-warning btn-circle" type="button"><i class="fa fa-times"></i></button></a>
			                        	<a href="{{url('/admin/goods/edit')}}?id={{$v->id}}"><button class="btn btn-primary btn-circle" type="button"><i class="fa fa-list"></i></button></a>
			                        </td>
			                    </tr>
			                    @endforeach
			                </tbody>
            			</table>
            		</div>
            	</div>	

        	</div>
    	</div>
    	<div class="row">
            		<div class="col-sm-6">
            			<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
            				{!! $goods->appends(['num'=>$request['num'],'keywords'=>$request['keywords']])->render() !!}
            				
            			</div>
            		</div>
            	</div>
	</div>
</div>
@endsection
