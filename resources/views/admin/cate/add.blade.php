@extends('layout.index')
@section('title','商品分类添加')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading"></div>
		<div class="panel-body">
	        <div class="row">
	            <div class="col-lg-6">
	                <form role="form" action="{{url('/admin/cates/insert')}}" method="post">
	                	<br>
	                    <div class="form-group">
	                        <label>商品类别</label>
	                        <select name="pid" class="form-control">
                                <option value="0">顶级分类</option>
                                @foreach($cates as $v)
								<option value="{{$v->id}}">{{$v->name}}</option>
								@endforeach
                            </select>
	                    </div><br>
						
	                    <div class="form-group">
	                        <label>商品名称</label>
	                        <input placeholder="" name="name" class="form-control">
	                    </div><br>

	                	<button class="btn btn-success" type="submit">添加</button>
	                	<button class="btn btn-danger" type="reset">重置</button>
	                	<br><br><br>
	                	{{csrf_field()}}
	                </form>
	            </div>
	        </div>
	    </div>
	</div>

@endsection