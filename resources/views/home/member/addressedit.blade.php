@extends("layout.member.memberindex")
@section("title","收货地址")
@section("content")
	<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

	<script type="text/javascript" src="/location/jquery.js"></script>
	<script type="text/javascript" src="/location/area.js"></script>
	<script type="text/javascript" src="/location/location.js"></script>


	<div class="col-md-8 col-md-offset-2">
		<div style="width:70%;margin:0 auto">
		    <ul class="nav nav-pills">
		       <li class="active"><a href="/members/index/?id={{$uid}}">个人信息</a></li>
		       <li class="active"><a href="/members/edit/?id={{$uid}}">信息修改</a></li>
		       <li class="active"><a href="/members/safe/?id={{$uid}}">安全中心</a></li>     
		       <li class="active"><a href="/members/collection/?id={{$uid}}">个人收藏</a></li>
		       <li class="active"><a href="/members/history/?id={{$uid}}">历史记录</a></li>  
		       <li class="active"><a href="/members/address/?id={{$uid}}">收货地址</a></li> 
		    </ul>
		</div>
	</div>

	<hr /><br />
		<div class="row">
			<div class="col-md-2 col-md-offset-9">
				
	   		<form id="address" action="/members/addressedit" method="post">
	            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
	                   <div class="modal-content">
	                    <div class="modal-header">
	                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                        
	                               <div class="form-group">
	                                    <label>收货人:</label>
	                                    <input class="form-control" name='name' value="">
	                                </div>

	                                <div class="form-group">
	                                    <label>联系电话:</label>
	                                    <input class="form-control" name='phone' value="">
	                                </div>

	                     </div>
	                     <div class="modal-body">  
	                        <select id="loc_province" class="" name="sheng" style="width:80px;"></select>
	                        <select id="loc_city" class="" name="shi" style="width:100px;"></select>
	                        <select id="loc_town" class="" name="xian" style="width:120px;"></select>
	                        <div class="form-group">

	                                    <label>详细地址:</label>
	                                    <input class="form-control" id="jiedao" name='address' value="">
	                        </div>
	                     </div>
	                     <input type="hidden" name="ssx" value="">
	                     <input type="hidden" name="uid" value="{{$uid}}">
	                     {{csrf_field()}}
	                     <div class="modal-footer">
	                       <button class="btn btn-primary">确定</button>
	                     </div>
	                   </div>
	                 </div>
	                </div>
	        </form>
		</div>
	</div>
<br />



		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dataTables-example_info">
					<thead>
					    <tr role="row">
					        <th style="text-align:center">收货人</th>
					        <th style="text-align:center">电话</th>
					        <th style="text-align:center">地址</th>
					        <th style="text-align:center">操作</th>
					    </tr>
					</thead>
				<tbody>

				@foreach ($users as $v)  

					<tr class="gradeA odd" role="row">

		        		<td class="">{{$v->name}}</td>
				        <td class="sorting_1">{{$v->phone}}</td>
				        <td>{{$v->ssx}}{{$v->address}}</td>
				        <td class="sorting_1">
							<button type="button" class="btn btn-primary btn-lg" value="{{$uid}}">修改</button>
							<button class="btn btn-primary btn-lg" name="shanchu" value="{{$v->id}}">删除</button>
					    </td>
	    			</tr>

	    		@endforeach 
					
				</tbody>
				</table>
			</div>
		</div>


@endsection
@section('myjs')

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

		//点击选中默认地址
		$('#addresses .item').each(function(){
			$(this).click(function(){
				$('#addresses .item').removeClass('aa');	
				$(this).addClass('aa');
				//获取当前点击的地址id
				var id  = $(this).attr('aid');	
				$('input[name=address_id]').val(id);
			})
		})

		$("#address").submit(function() {
			var sheng = $("#loc_province").val(); 
			var shi = $("#loc_city").val(); 
			var xian = $("#loc_town").val(); 
			var str = sheng+','+shi+','+xian; 
			// console.log(sheng,shi,xian);
			var res = getInfo(str);
			// alert(res);
			// return false;
			$(this).find('input[name=ssx]').val(res);
			// return false;
		});				
	});
	</script>



@endsection