@extends('layout.index')
@section('title','购物车列表')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading"></div>
	<div class="panel-body">
        <div class="dataTable_wrapper">
            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            	<div class="row">
            		<div class="col-sm-6">
            		<div class="dataTables_length" id="dataTables-example_length">
            		<label>每页 <select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm">
            			<option value="10">10</option>
            			<option value="25">25</option>
            			<option value="50">50</option>
            			<option value="100">100</option>
            			</select> 条
            		</label>
            		</div>
            		</div>
	        		<div class="col-sm-6">
	        		<div id="dataTables-example_filter" class="dataTables_filter">
	        			<label> 关键字 : 
	        				<input type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-example">
	        			</label>
	        			<button class="btn btn-info" type="button">搜索</button>
	        		</div>
	        		</div>
        		</div>
        		<div class="row">
        			<div class="col-sm-12">
        				<table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dataTables-example_info">
			                <thead>
			                    <tr role="row">
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="Platform(s): activate to sort column ascending">用户名</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="CSS grade: activate to sort column ascending">商品信息</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="CSS grade: activate to sort column ascending">商品个数</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="CSS grade: activate to sort column ascending">单价</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="CSS grade: activate to sort column ascending">添加时间</th>
			                    	<th  tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1"  aria-label="CSS grade: activate to sort column ascending">操作</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	<tr class="gradeA odd" role="row">
			                        <td class="sorting_1">Gecko</td>
			                        <td class="sorting_1">Gecko</td>
			                        <td class="sorting_1">Gecko</td>
			                        <td class="sorting_1">Gecko</td>
			                        <td class="sorting_1">Gecko</td>
			                        <td class="sorting_1">Gecko</td>
			                        <td class="sorting_1">Gecko</td>
			                    </tr>
			                </tbody>

            			</table>
            		</div>
            	</div>	
        	</div>
    	</div>
	</div>
</div>
@endsection