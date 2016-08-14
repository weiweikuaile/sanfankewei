@extends("layout.index")
@section("title",'用户列表')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<div class="row">
		    <div class="col-lg-12">
				
			        @if(session("success"))	
						<div class="alert alert-info alert-dismissable">
						    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
						    {{session("success")}}
						</div>
					@endif
						
					@if(session("error"))
						<div class="alert alert-danger alert-dismissable">
						    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
						    {{session("error")}}
						</div>
					@endif
		           <div class="panel-body">
		                <div class="dataTable_wrapper">
		                    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
							<form action="{{url("/admin/users/index")}}" method="get">
		    					<div class="row">
			                    	<div class="col-sm-6">
			                    		<div class="dataTables_length" >
			                        		<label>每页
			                        		<select name='num' class="form-control input-sm">
					                            <option value="5" 
													@if(!empty($request['num']) && $request['num'] == 5)
														selected
													@endif 
					                            >5</option>
					                            <option value="10"
													@if(!empty($request['num']) && $request['num'] == 10)
														selected
													@endif
					                            >10</option>
					                            <option value="15"
						                            @if(!empty($request['num']) && $request['num'] == 15)
														selected
													@endif
												>15</option>
					                            <option value="100"
						                            @if(!empty($request['num']) && $request['num'] == 100)
														selected
													@endif
												>100</option>
			                        		</select>行
			                        		</label>
										</div>
			                        </div>
							        <div class="col-sm-6">
							            <div id="dataTables-example_filter" class="dataTables_filter">
							                <label><input 
								                @if(!empty($request['keywords']))
								                value="{{$request['keywords']}}"
								                @endif
								                name='keywords' type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-example">
							                	<button>搜索</button>
							                </label>
							            </div>
							        </div>
		    					</div>
							</form>

							<div class="row">
								<div class="col-sm-12">
									<table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dataTables-example_info">
										<thead>
										    <tr role="row">
										        <th style="text-align:center">用户名</th>
										        <th style="text-align:center">邮箱</th>
										        <th style="text-align:center">电话</th>
										        <th style="text-align:center">头像</th>
										        <th style="text-align:center">状态</th>
										        <th style="text-align:center">操作</th>
										    </tr>
										</thead>
										<tbody> 
											@foreach ($users as $v)  
											<tr class="gradeA odd" role="row">
								        		<td class="">{{$v->username}}</td>
										        <td class="sorting_1">{{$v->email}}</td>
										        <td>{{$v->phone}}</td>
										       	<td class="center"><img width=25px; src="{{$v->pic}}" /></td>
										        <td>{{$v->status}}</td>
										        <td><button class="btn btn-outline btn-danger btn_dlete" type="button" value="{{$v->id}}">删除</button>
										        	<a href="/admin/users/edit/{{$v->id}}">修改</a>
										        </td>
							    			</tr>
							    			@endforeach 
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
									{!! $users->appends(['num'=>$request['num'],'keywords'=>$request['keywords']])->render() !!}
									</div>
								</div>
							</div>
							</div>
		    			</div>
		       		</div>
		        
		    </div>
		</div>
	</div>
</div>
@endsection


@section('myjqery')
	<script type="text/javascript">
	//获取按钮绑定事件
	$('.btn_dlete').click(function(){
		var id = $(this).val();
		var btn = $(this);
		//发送ajax请求  post
		$.ajaxSetup({
        		headers: {
            		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        				}
			});
		$.post("{{url('/admin/users/ajaxdelete')}}",{id:id},function(data){
			//判断
			if(data == 1){
				// $(this).parents("tr").remove();
				btn.parents("tr").remove();
			}else{
				alert("删除失败!");
			}
		});
	})
	</script>
@endsection
