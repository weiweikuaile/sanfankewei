@extends("layout.member.memberindex")
@section("title","个人信息修改")
@section("content")
<script type="text/javascript" src="/location/jquery.js"></script>
<script type="text/javascript" src="/location/area.js"></script>
<script type="text/javascript" src="/location/location.js"></script>

@foreach($users as $v)
<div style="width:70%;margin:0 auto">
    <ul class="nav nav-pills">
       <li class="active"><a href="/members/index/?id={{$v->id}}">个人信息</a></li>
       <li class="active"><a href="/members/edit/?id={{$v->id}}">信息修改</a></li>
       <li class="active"><a href="/members/safe/?id={{$v->id}}">安全中心</a></li>     
       <li class="active"><a href="/members/collection/?id={{$v->id}}">个人收藏</a></li>
       <li class="active"><a href="/members/history/?id={{$v->id}}">历史记录</a></li>  
       <li class="active"><a href="/members/address/?id={{$v->id}}">收货地址</a></li> 
    </ul>
        <div class="panel panel-default">
            <div class="panel-body">
                
                        
                                <form role="form" action="{{url('/members/update')}}" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>头像:</label>
                                            <img src="{{$v->pic}}" class="img-responsive" alt="" width="100px">
                                            <input type="file" name="pic">
                                        </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>用户名:{{$v->username}}</label><br />
                                            <!-- <span>{{$v->username}}</span> -->
                                        </div>

                                        <div class="form-group">
                                            <label>昵称:</label>
                                            <input class="form-control" name='nickname' value="{{$v->nickname}}">
                                        </div>

                                        <div class="form-group">
                                            <label>邮箱:</label>
                                            <input class="form-control" name="email" value="{{$v->email}}">
                                        </div>

                                       <div class="form-group">
                                            <label>电话:</label>
                                            <input class="form-control" name='phone' value="{{$v->phone}}">
                                        </div>

                                        <div class="form-group">
                                            <label>性别</label>
                                            <label class="radio-inline">
                                                <input type="radio" checked="" value="option1" name="sex">男
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" value="option2" name="sex">女
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <br/>
                                        <br />
                                        <div class="form-group">
                                            <label>收货人:</label>
                                            <input class="form-control" name="email" value="{{$v->email}}">
                                        </div>

                                        <div class="form-group">
                                            <label>联系电话:</label>
                                            <input class="form-control" name="email" value="{{$v->email}}">
                                        </div>

                                        <div class="form-group">
                                            <label>收货地址:</label><br />
                                            <select id="loc_province" class="" name="sheng" style="width:80px;"></select>
                                            <select id="loc_city" class="" name="shi" style="width:100px;"></select>
                                            <select id="loc_town" class="" name="xian" style="width:120px;"></select>
                                        </div>

                                        <div class="form-group">
                                            <label>详细地址:</label>
                                            <input class="form-control" name="email" value="{{$v->email}}">
                                        </div>
                                       
                                        <input type="hidden" name="id" value="{{$v->id}}">
                                    <button class="btn btn-primary btn-lg" data-target="#myModal">提交</button>
                                    <button type="button" class="btn btn-primary btn-lg" data-target="#myModal">重置</button>
                                {{csrf_field()}}
                    </form>
                </div>                            
            </div>
        </div>
</div>
@endforeach

@endsection

@section("myjs")
    <script type="text/javascript">
    $(document).ready(function() {
        showLocation();
        $('#addresses .attr').each(function(){
            var str = $(this).attr('attr');
            var info = getInfo(str);
            $(this).html(info);
        });

        //定义获取城市信息方法
        function getInfo(str){
            //console.log(str);
            //拆分字符串
            var arr = str.split(',');
            // console.log(arr);    
            var ls  = new Location;
            var l = ls.items;
            // console.log(l['0,1,2']['5']);
            var sheng = l['0'][arr[0]];
            var shi = l['0,'+arr[0]][arr[1]];
            var xian = l['0,'+arr[0]+','+arr[1]][arr[2]];
            return sheng+shi+xian;
        }

        //点击选中默认地址
        $('#addresses .item').each(function(){
            $(this).click(function(){
                //
                $('#addresses .item').removeClass('aa');    
                $(this).addClass('aa');
                //获取当前点击的地址id
                var id  = $(this).attr('aid');  
                $('input[name=address_id]').val(id);
            })
        })              
    });
    </script>
@endsection




<!--    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
     收 货 地 址
   </button>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        
                               <div class="form-group">
                                    <label>收货人:</label>
                                    <input class="form-control" name='zname' value="">
                                </div>                   
                                <div class="form-group">
                                    <label>联系电话:</label>
                                    <input class="form-control" name='phone' value="{{$v->phone}}">
                                </div>

                       </div>
                     <div class="modal-body">
                        <select id="loc_province" class="" name="sheng" style="width:80px;"></select>
                        <select id="loc_city" class="" name="shi" style="width:100px;"></select>
                        <select id="loc_town" class="" name="xian" style="width:120px;"></select>
                        <div class="form-group">
                                    <label>详细地址:</label>
                                    <input class="form-control" name='phone' value="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="isdefault" value="1" type="radio">默认
                                <input name="isdefault" value="0" type="radio">否
                            </label>
                        </div>
                     </div>
                     {{csrf_field()}}
                     <div class="modal-footer">
                       <button class="btn btn-default" data-dismiss="modal">关闭</button>
                       <button class="btn btn-primary">确定</button>
                     </div>
                   </div>
                 </div>
                </div -->