@extends("layout.member.memberindex")
@section("title","历史记录")
@section("content")
@foreach ($users as $v)
<div style="width:70%;margin:0 auto">
    <ul class="nav nav-pills">
       <li class="active"><a href="/members/index/?id={{$v->id}}">个人信息</a></li>
       <li class="active"><a href="/members/edit/?id={{$v->id}}">信息修改</a></li>
       <li class="active"><a href="/members/safe/?id={{$v->id}}">安全中心</a></li>     
       <li class="active"><a href="/members/collection/?id={{$v->id}}">个人收藏</a></li>
       <li class="active"><a href="/members/history/?id={{$v->id}}">历史记录</a></li>  
       <li class="active"><a href="/members/address/?id={{$v->id}}">收货地址</a></li> 
    </ul>
</div>

@endforeach


@endsection