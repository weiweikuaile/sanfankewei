@extends('layout.index')
@section('title','商品修改')
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
	                <form role="form" action="{{url('/admin/links/update')}}" method="post" enctype="multipart/form-data">
	                	<br>
	                	<div class="form-group">
	                        <label>ID</label>
	                        <input name="id" class="form-control" value="{{$links->id}}" disabled>  
	                    </div>
	                	
	                    <div class="form-group">
	                        <label>网站名</label>
	                        <input placeholder="" name="name" class="form-control" value="{{$links->name}}">
	                    </div>
						
	                    <div class="form-group">
	                        <label>网站标题</label>
	                        <input placeholder="" name="title" class="form-control" value="{{$links->title}}">
	                    </div>
	                    <div class="form-group">
	                        <label>网站地址</label>
	                        <input placeholder="" name="url" class="form-control" value="{{$links->url}}">
	                    </div>
	                    <div class="form-group">
	                        <label>商品图片</label>
	                        <input type="file" name="pic">
	                        <img src="{{$links->pic}}" style="width:200px;height:300px">
	                    </div>
	                    <div class="form-group">
	                        <label>排序</label>
	                        <input type="text" name="order" value="{{$links->order}}" class="form-control">
	                    </div>
	                    <div class="form-group">
	                        <label>状态</label>
	                        <input type="text" name="status" value="{{$links->status}}" class="form-control">
	                        <p class="help-block"></p>
	                    </div>
	                   
	                    <input type="hidden" name="id" value="{{$links->id}}"> 
	                    <input type="hidden" name="pic" value="{{$links->pic}}">
	                	<button class="btn btn-success" type="submit">修改</button>
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