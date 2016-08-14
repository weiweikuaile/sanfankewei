@extends('layout.index')
@section('title','添加订单')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading"></div>
	<div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <form role="form">
                    <div class="form-group">
                        <label>Text Input</label>
                        <input placeholder="Enter text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Text Input with Placeholder</label>
                        <input placeholder="Enter text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>File input</label>
                        <input type="file">
                    </div>
                
                	<button class="btn btn-success" type="submit">添加</button>
                	<button class="btn btn-danger" type="reset">重置</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection