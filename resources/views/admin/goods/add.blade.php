@extends('layout.index')
@section('title','商品添加')
@section('content')
<script type="text/javascript" charset="utf-8" src="/admins/bianji/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/admins/bianji/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/admins/bianji/lang/zh-cn/zh-cn.js"></script>
	<div class="panel panel-default">
		<div class="panel-heading"></div>
		<div class="panel-body">
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
	        <div class="row">
	            <div class="col-lg-6">
	                <form role="form" action="{{url('/admin/goods/insert')}}" method="post" enctype="multipart/form-data">
	                	<br>
	                    <div class="form-group">
	                        <label>商品名称</label>
	                        <input placeholder="" name="title" class="form-control">
	                    </div>
						<div class="form-group">
	                        <label>所属类别</label>
	                        <select name="cid" class="form-control">
                                @foreach($cates as $k=>$v)
                       				<option value="{{$v->id}}">{{$v->name}}</option>
                       			@endforeach
                            </select>
	                    </div>
	                    <div class="form-group">
	                        <label>商品单价</label>
	                        <input placeholder="" name="price" class="form-control">
	                    </div>
	                    <div class="form-group">
	                        <label>商品库存</label>
	                        <input placeholder="" name="num" class="form-control">
	                    </div>
	                    <div class="form-group">
	                        <label>商品图片:</label>
	                        <input type="file" name="pic">
	                    </div>
	                    <div class="form-group">
	                        <label>商品详情</label>
	                        <script id="editor" name="content" type="text/plain" style="width:500px;height:300px;"></script>
	                    </div>
	                    
	                	<button class="btn btn-success" type="submit">添加</button>
	                	<button class="btn btn-danger" type="reset">重置</button>
	                	<br><br><br>
	                	{{csrf_field()}}
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
<script type="text/javascript">
    var ue = UE.getEditor('editor',
    	{toolbars: [
		    ['fullscreen', 'source', 'undo', 'redo'],
		    ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
		]}
	);
</script>
@endsection