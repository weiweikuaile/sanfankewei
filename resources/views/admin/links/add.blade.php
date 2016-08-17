@extends('layout.index')
@section('title','友情链接添加')
@section('content')
<script type="text/javascript" charset="utf-8" src="/admins/bianji/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/admins/bianji/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/admins/bianji/lang/zh-cn/zh-cn.js"></script>


  <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
      @if(count($errors)>0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif 
      <div class="row">
        <div class="col-lg-6">
          <form role="form" action="{{url('/admin/links/insert')}}" method="post" enctype="multipart/form-data">
              
              <input type="hidden" name="id" class="form-control">
            
              <div class="form-group">
                  <label>网站名</label>
                  <input type="text" name="name" value="{{old('name')}}" class="form-control">
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>网站标题</label>
                  <input type="text" name="title" value="{{old('title')}}" class="form-control">
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>网站地址</label>
                  <input type="text" name="url" value="{{old('url')}}" class="form-control">
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>网站图片</label>
                  <input type="file" name="pic">
              </div>
              <div class="form-group">
                  <label>排序</label>
                  <input type="text" name="order" value="{{old('order')}}" class="form-control">
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>状态</label>
                  <input type="text" name="status" value="{{old('status')}}" class="form-control">
                  <p class="help-block"></p>
              </div>
              
              {{csrf_field()}}
              <button class="btn btn-success" type="submit">添加</button>
              <button class="btn btn-danger" type="reset">重置</button>
              
          </form>
        </div>
      </div>
            

    </div>
  </div>
        

@endsection
