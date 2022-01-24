<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{$title}}</title>
    <link rel="icon" href="{{env('PUBLIC_PATH')}}/admin_resources/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="{{env('PUBLIC_PATH')}}/admin_resources/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="{{env('PUBLIC_PATH')}}/admin_resources/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="{{env('PUBLIC_PATH')}}/admin_resources/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="{{env('PUBLIC_PATH')}}/admin_resources/css/style.css" rel="stylesheet">
</head>

<body class="login-page" style="background: url({{env('PUBLIC_PATH')}}/{{$config_data['login_background']}}); background-attachment: fixed;    background-repeat: no-repeat; background-size: cover;">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">Login<b>BaroVoot</b>Admin</a>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST" action="{{route('admin.login.submit')}}">
                <div class="msg">
                    @if(session()->has('message'))
                        {!! session()->get('message') !!}
                    @endif
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        {{@csrf_field()}}
                        <input type="text" class="form-control" name="email" placeholder="email" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                        <label for="rememberme">Remember Me</label>
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-md btn-success waves-effect" type="submit">SIGN IN</button>
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">
                        <a href="forgot-password.html">Forgot Password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{env('PUBLIC_PATH')}}/admin_resources/plugins/jquery/jquery.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/admin_resources/plugins/bootstrap/js/bootstrap.js"></script>
<script src="{{env('PUBLIC_PATH')}}/admin_resources/plugins/node-waves/waves.js"></script>
<script src="{{env('PUBLIC_PATH')}}/admin_resources/plugins/jquery-validation/jquery.validate.js"></script>
<script src="{{env('PUBLIC_PATH')}}/admin_resources/js/admin.js"></script>
<script src="{{env('PUBLIC_PATH')}}/admin_resources/js/pages/examples/sign-in.js"></script>
</body>

</html>