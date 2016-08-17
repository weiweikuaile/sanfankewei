@extends('layout.index')
@section('title','友情链接列表')
@section('content')


<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">

      </div>
       
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
            @if(session("error"))
              <div class="alert alert-danger alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                          {{session("error")}}
            </div>
            @endif
            @if(session("success"))
              <div class="alert alert-info alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                          {{session("success")}}
            </div>
            @endif
            <form action="{{url('/admin/links/index')}}" method="get">
            <div class="row">
                <div class="col-sm-6">
                    <div class="dataTables_length" id="dataTables-example_length">
                        <label>显示
                            <select name="num" aria-controls="dataTables-example" class="form-control input-sm">
                              <option value="10"
                                @if(!empty($request['num']) && $request['num']==10)
                                selected
                                @endif 
                              >10</option>
                              <option value="25"
                                @if(!empty($request['num']) && $request['num']==25)
                                selected
                                @endif 
                              >25</option>
                              <option value="50"
                                @if(!empty($request['num']) && $request['num']==50)
                                selected
                                @endif
                              >50</option>
                              <option value="100"
                              @if(!empty($request['num']) && $request['num']==100)
                              selected
                              @endif
                              >100</option>
                            </select>
                        条
                        </label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="dataTables-example_filter" class="dataTables_filter">
                        <label>关键字:
                            <input
                                @if(!empty($request['keywords']))
                                  value="{{$request['keywords']}}" 
                                
                                @endif
                            name="keywords" type="search" class="form-control input-sm" placeholder="" aria-controls="dataTables-example">
                        <button class="btn btn-primary">搜索</button>
                        </label>
                    </div>
                </div>
            </div>
            </from>
            <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th width="16"><input type="checkbox" id="check_box" onclick="selectall('id[]');"></th> 
                <th class="tc" width="16">排序</th>
                <th class="tc" width="17">ID</th>
                <th width="60">网站名</th>
                <th width="160">网站标题</th>
                <th width="20">网站地址</th>
                <th width="190">网站图片</th>
                <!-- <th width="35">排序</th> -->
                <th width="100" align="center">操作</th>
                <th width="35">状态</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
                <tr>
                    <td><input type="checkbox" name="id[]" value="{{$v->id}}"></td>
                    
                    <td ><input type="text" onchange="changeOrder(this,{{$v->id}})" value="{{$v->order}}" style=" width:35px"> </td>
                    <td class="sid">{{$v->id}}</td>
                    <td>{{$v->name}}</td>
                    <td>{{$v->title}}</td>
                    <td>{{$v->url}}</td>
                    <td class="center"><img width="50px" src="{{$v->pic}}"></td>
                    <!-- <td>{{$v->order}}</td> -->
                    <!-- <td class="center"><img width="50px" src="{{$v->pic}}"></td> -->
                    <td class="center">
                           
                            <!-- <button class="btn btn-info btn-xs btn_update" href="{:U('edit',array('id'=>$item['id']))}"><i class="fa fa-paste"></i> 修改</button> -->
                            <a href="/admin/links/edit?id={{$v->id}}" class="btn btn-info btn-xs btn_update"><i class="fa fa-paste"></i> 修改</a>
                            <!-- <button class="btn btn-warning btn-xs btn_delete" href="javascript:ajaxDelete('{:U('delete',['id'=>$item['id']])}')"><i class="fa fa-times"></i> 删除</button> -->
                            <button class="btn btn-warning btn-xs btn_delete" type="button"><i class="fa fa-times"></i> 删除</button>
                    </td>
                    <td>{{$v->status}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="9">
                    <div class="data-btn">
                        <label for="check_box" style="margin-right: 10px;">全选/取消</label>
                        <input type="button" class="btn btn-primary btn-sm" value="排序" onclick="javascript:ajaxListorder('{:U('listorder')}')">
                        <!-- <input type="button" class="btn btn-primary btn-sm" value="置顶" onclick="javascript:ajaxListorder('{:U('listorder')}')">
                        <input type="button" class="btn btn-primary btn-sm" value="推荐" onclick="javascript:ajaxListorder('{:U('listorder')}')">
                        <input type="button" class="btn btn-primary btn-sm" value="热点" onclick="javascript:ajaxListorder('{:U('listorder')}')">
                        <input type="button" class="btn btn-primary btn-sm" value="发布" onclick="javascript:ajaxDeal('id[]','{:U('toggle',['act'=>1])}')">
                        <input type="button" class="btn btn-primary btn-sm" name="dosubmit" value="草稿" onclick="javascript:ajaxDeal('id[]','{:U('toggle',['act'=>0])}')">
                        <input type="button" class="btn btn-primary btn-sm" name="dosubmit" value="删除" onclick="javascript:ajaxDeal('id[]','{:U('delete')}',

                        '确认执行该删除操作,删除后数据无法恢复?')">-->

                    </div>
                </td>
            </tr>
            </tfoot>
</table>
            <div class="row">
              <div class="col-sm-6">
                <div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite"></div></div>
              <div class="col-sm-6">
                <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                 {!! $data->appends(['num'=>$request['num'],'keywords'=>$request['keywords']])->render()!!} 
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
  <!-- /.col-lg-12 -->
</div>

@endsection
@section('ajax')
  <script type="text/javascript">
    function changeOrder(obj,id){
      var order=$(obj).val();
      $.post("{{url('admin/links/changeorder')}}",{'_token':'{{csrf_token()}}','id':id,'order':order},function(data){
        if(data.status == 0){
          layer.msg(data.msg, {icon:6});
          
        }else{
          layer.msg(data.msg,{icon:5});
          

        }
      });
    }
    //获取删除的按钮id 绑定单击事件
    $('.btn_delete').click(function(){
        //alert('4444444');//第一步看点击删除按钮时，能否弹出4444444的内容，出现了就代表绑定单击事件成功。
        //获取id
        var n=$(this);

        var id=$(this).parents('tr').find('.sid').html();

        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //发送ajax post请求
        $.post('{{url("/admin/links/delete")}}',{id:id},function(data){
            //console.log(data);
                /*if(data == 1){
                    n.parents('tr').remove();
                }*/
                if(data.status==0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                } 

            });
        
    })
    </script>
@endsection