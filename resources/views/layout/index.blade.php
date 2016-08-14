<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>后台--@yield('title')</title>
    <link href="/admins/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admins/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="/admins/dist/css/timeline.css" rel="stylesheet">
    <link href="/admins/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="/admins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="/admins/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">三凡客后台管理</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <p>管理员:{{session('username')}}</p>
                </li>
                <li class="dropdown">
                    <a href="{{url('/admin/logins/out')}}">注销</a>
                </li>
            </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li>

                        <!-- 用户管理 -->
                        <li>
                            <a href="index.html"><i class="fa fa-user fa-fw"></i>用户管理</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/admin/users')}}">用户列表</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/users/add')}}">用户添加</a>
                                </li>
                            </ul>
                        </li>
                        <!-- 用户管理 -->
                        
                        <!-- 商品分类管理 -->
                        <li>
                            <a href="index.html"><i class="fa fa-shopping-cart fa-fw"></i>商品分类管理</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/admin/cates')}}">商品分类列表</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/cates/add')}}">商品分类添加</a>
                                </li>
                            </ul>
                        </li>
                        <!-- 商品分类管理 -->

                        <!-- 商品管理 -->
                        <li>
                            <a href="index.html"><i class="fa fa-shopping-cart fa-fw"></i>商品管理</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/admin/goods')}}">商品列表</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/goods/add')}}">商品添加</a>
                                </li>
                            </ul>
                        </li>
                        <!-- 商品管理 -->

                        <!-- 评论管理 -->
                        <li>
                            <a href="index.html"><i class="fa fa-bullhorn fa-fw"></i>商品评论管理</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/admin/comments')}}">商品评论列表</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/comments/add')}}">商品评论添加</a>
                                </li>
                            </ul>
                        </li>
                        <!-- 评论管理 -->
                        
                        <!-- 购物车管理 -->
                        <li>
                            <a href="index.html"><i class="fa fa-calendar fa-fw"></i>购物车管理</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/admin/carts')}}">购物车列表</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/carts/add')}}">购物车添加</a>
                                </li>
                            </ul>
                        </li>
                        <!-- 购物车管理 -->

                        <!-- 订单管理 -->
                        <li>
                            <a href="index.html"><i class="fa fa-calendar fa-fw"></i>订单管理</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/admin/orders')}}">订单列表</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/orders/add')}}">订单添加</a>
                                </li>
                            </ul>
                        </li>
                        <!-- 订单管理 -->

                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('title')</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            @section('content')
            <!-- /.row -->

            @if(session('success'))
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    {{session("success")}}
                </div>
            @endif

            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>New Comments!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @show

        </div>
    </div>
    <script src="/admins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/admins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/admins/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="/admins/dist/js/sb-admin-2.js"></script>
    @section('ajax')
    @show
</body>
</html>
