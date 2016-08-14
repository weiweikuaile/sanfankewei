@extends("layout.index")
@section("title",'后台用户修改')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-8">
				<form role="form" action="{{url("/admin/users/update")}}" method="post" enctype="multipart/form-data">
				    <div class="form-group">
				        <label>用户名:</label>
				        <input type="text" name="username" class="form-control" value="{{$res->username}}">
				    </div>
				    <div class="form-group">
				        <label>邮箱:</label>
				        <input type="email" name="email" class="form-control" value="{{$res->email}}">
				    </div>
				    <div class="form-group">
				        <label>TEL:</label>
				        <input type="text" name="phone" class="form-control" value="{{$res->phone}}">
				    </div>
				    <input type="hidden" name="uid" value="{{$res->id}}">
				    <button type="submit">重置</button>
				    <button type="submit">修改</button>
				    {{csrf_field()}}
				</form>
			</div>
		</div>
	</div>
</div>
@endsection