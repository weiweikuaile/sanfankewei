@extends('layout.homeindex')
@section('content')

<div style="width:80%;margin:0 auto">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
				  <li><a href="#">当前位置：</a></li>
				  <li><a href="#">所有分类</a></li>
				  <li><a href="#">男装</a></li>
				  <!-- <li><a href="#">连衣裙</a></li>
				  <li class="active">衬衫裙</li> -->
				</ol>
			</div>
		</div>
		<ul class="nav nav-pills">
		  <li role="presentation" class=""><a href="#">T恤</a></li>
		  <li role="presentation" class=""><a href="#">衬衫</a></li>
		  <li role="presentation" class=""><a href="#">上装</a></li>
		  <li role="presentation" class=""><a href="#">裤装</a></li>
		  <li role="presentation" class=""><a href="#">其他</a></li>
		</ul>
		
		
		<div class="row">
			<div class="col-md-1">
			                    <a title="按推荐由高到低" name="s_order_27544_5" class="track" href="#">
			        	                    <b>默认</b>
			        	                    <!-- <span class="upTrendBottom" style="text:hidden">按推荐由高到低</span> -->
			                    </a>
			              
			</div>
			
			<div class="col-md-1">
                    <a title="按评价从高到低" name="s_order_27544_5" class="track" href="#">
        	                    <b>好评</b>
        	                    <!--<span class="upTrendBottom">按评价从高到低</span>-->
                 	</a>
			</div>

			<div class="col-md-1">
        	                <a title="按价格从低到高" name="s_order_27544_3" class="track" href="#">
        	                    <b>价格</b>
        	                    <!--<span class="BottomTrendUp">按价格从低到高</span>-->
        	                </a>
			</div>
		</div>
        <!-- 从网站上粘贴的源代码<div class="presentation">
            <ul>
                <li class="moren">
                    <a title="按推荐由高到低" name="s_order_27544_10" class="track" href="27544.html">
        	                    <em>默认</em>
        	                    <span class="upTrendBottom">按推荐由高到低</span>
                    </a>
                </li>
                
                <li class="haoping">
                    <a title="按评价从高到低" name="s_order_27544_5" class="track" href="27544-s5.html">
        	                    <em>好评</em>
        	                    <span class="upTrendBottom">按评价从高到低</span>
                 	</a>
                </li>
                <li class="jiage jiageHover" id="sortTypeMore">
        	                <a title="按价格从低到高" name="s_order_27544_3" class="track" href="27544-s3.html">
        	                    <em>价格</em>
        	                    <span class="BottomTrendUp">按价格从低到高</span>
        	                </a>
                </li>                        
            </ul>
         		</div>    -->
		<div class="row">
		@foreach($list as $k=>$v)
		  <div class="col-sm-6 col-md-3">	
		    <div class="thumbnail">
		      <a href="/info?id={{$v->id}}"><img height="70" src="{{$v->pic}}"></a>
		      <div class="caption">
		        <p><a href="/info?id={{$v->id}}">{!!$v->title!!}</a><!-- <a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a> --></p>
		      	<h4 style="color:#B22222;font-weight:900">售价￥{{$v->price}}</h4>
		      	<p>库存&nbsp;{{$v->num}}</p>
		      </div>
		    </div>
		  </div>
		@endforeach
		</div>  
		<!--分页start-->
		<div class="container-fluid" style="text-align:right">
			<div class="row-fluid">
				<div class="span12">
					<div class="pagination">
						<ul class="pagination">
							<li>
								<a rel="nofollow" href="#">上一页</a>
							</li>
							<li>
								<a rel="nofollow" href="#">1</a>
							</li>
							<li>
								<a rel="nofollow" href="#">2</a>
							</li>
							<li>
								<a rel="nofollow" href="#">3</a>
							</li>
							<li>
								<a rel="nofollow" href="#">4</a>
							</li>
							<li>
								<a rel="nofollow" href="#">5</a>
							</li>
							<li>
								<a rel="nofollow" href="#">下一页</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--分页end-->
</div>
@endsection