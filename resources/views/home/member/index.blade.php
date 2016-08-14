@extends("layout.member.memberindex")
@section("title",'个人中心')
@section('content')
@foreach ($users as $v)	

		<div style="width:70%;margin:0 auto">
    <div class="row">
    <div class="col-md-8 .col-md-offset-4">
			<ul class="nav nav-pills">
			   <li class="active"><a href="/members/index/?id={{$v->id}}">个人信息</a></li>
			   <li class="active"><a href="/members/edit/?id={{$v->id}}">信息修改</a></li>
			   <li class="active"><a href="/members/safe/?id={{$v->id}}">安全中心</a></li>	   
			   <li class="active"><a href="/members/collection/?id={{$v->id}}">个人收藏</a></li>
			   <li class="active"><a href="/members/history/?id={{$v->id}}">历史记录</a></li>  
         <li class="active"><a href="/members/address/?id={{$v->id}}">收货地址</a></li> 
			</ul>
    </div>
  </div>

<div class="row">
<div class="col-sm-10 .col-md-offset-2">
  <div class="col-md-6">
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div><img width=80px; src="{{$v->pic}}" /></div>
            <th>账号:</th>
        <table class="table">
              <tr class="active">
                    <td class="center">{{$v->username}}</td>
              </tr>
              <th>邮箱:</th>
              <tr class="success">
                   <td class="center">{{$v->email}}</td>
              </tr>
              <th>昵称:</th>
              <tr class="warning">
                   <td class="center">{{$v->nickname}}</td>
              </tr>

              <th>电话:</th>
              <tr  class="danger">
                    <td class="center">{{$v->phone}}</td>
              </tr>
              <th>QQ:</th>
              <tr  class="active">
                    <td class="center">{{$v->qq}}</td>
              </tr>
        </table>
  </div>
  <div class="col-md-6">
            <th>账号:</th>
        <table class="table">
              <tr class="active">
                    <td class="center">{{$v->username}}</td>
              </tr>
              <th>邮箱:</th>
              <tr class="success">
                   <td class="center">{{$v->email}}</td>
              </tr>
              <th>昵称:</th>
              <tr class="warning">
                   <td class="center">{{$v->nickname}}</td>
              </tr>

              <th>电话:</th>
              <tr  class="danger">
                    <td class="center">{{$v->phone}}</td>
              </tr>
              <th>QQ:</th>
              <tr  class="active">
                    <td class="center">{{$v->qq}}</td>
              </tr>
        </table>
  </div>
  </div>
</div>
</div>                  
 
@endforeach

@endsection