<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>后台登录</title>
    <link href="/admins/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admins/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="/admins/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="/admins/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <br><br><br>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" style="text-align:center">
                        <h3>后台管理登录</h3>
                    </div>
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            {{session("error")}}
                        </div>
                    @endif
                    <div class="panel-body">
                        <form role="form" action="{{url("/admin/logins/dologin")}}" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="用户名" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="密码" name="password" type="password">
                                </div>
                                {{csrf_field()}}
                                <button class="btn btn-lg btn-success btn-block">登录</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/admins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/admins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/admins/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="/admins/dist/js/sb-admin-2.js"></script>
</body>
</html>
