@extends('layout.index')
@section('title','商品评论添加')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading"></div>
	<div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form">
                    <div class="form-group">
                        <label>选择商品</label>
                        <input placeholder="Enter text" class="form-control">
                    </div><br>

                    <div class="form-group">
                        <label>评论内容</label>
                        <input placeholder="Enter text" class="form-control">
                    </div><br>

                	<button class="btn btn-success" type="submit">添加</button>
                	<button class="btn btn-danger" type="reset">重置</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection