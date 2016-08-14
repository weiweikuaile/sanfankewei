@extends("layout.index")
@section("title",'后台用户添加')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading"></div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-8">
				@if (count($errors) > 0)
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        	<li><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></li>
				        </ul>
				    </div>
				@endif
				<form role="form" action="{{url("/admin/users/insert")}}" method="post" enctype="multipart/form-data">
				    <div class="form-group">
				        <label>用户名:</label>
				        <input type="text" name="username" class="form-control">
				    </div>
				    <div class="form-group">
				        <label>用户密码:</label>
				        <input type="password" name="password" class="form-control">
				    </div>
				        <div class="form-group">
				        <label>确认密码:</label>
				        <input type="password" name="repassword" class="form-control">
				    </div>
				    <div class="form-group">
				        <label>邮箱:</label>
				        <input type="email" name="email" class="form-control">
				    </div>
				    <div class="form-group">
				        <label>TEL:</label>
				        <input type="text" name="phone" class="form-control">
				    </div>
				    <div class="form-group">
				        <label>头像:</label>
				        <input type="file" name="pic">
				    </div>
				    <button class="btn btn-success" type="submit">提交</button>
				    <button class="btn btn-danger" type="reset">重置</button>
				    {{csrf_field()}}
				</form>
			</div>
		</div>
	</div>
</div>
@endsection