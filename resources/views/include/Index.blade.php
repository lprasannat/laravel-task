<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Log in</title>
        <script type='text/javascript' src='/js/jquery.js'></script>
        <script type='text/javascript' src='/js/AdminJs.js'></script>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('/css/AdminLTE.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('/css/blue.css')}}">

    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Admin</b>LTE</a>

            </div>
            @if ( session()->has('password') )
            <div class="alert alert-info">{{ session()->get('password') }}</div>
            @endif
            @if ( session()->has('logout') )
            <div class="alert alert-info">{{ session()->get('logout') }}</div>
            @endif

            <!-- /.login-logo -->
            @if(isset($error))
            <div class="alert alert-danger">{{$error}}</div>
            @endif
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{URL::route('next')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email" name="Email" id="Email" />
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <span class="error" id="Email_error"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="Password" id="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <span class="error" id="PasswordError"></span>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" name="login" id="login" class="btn btn-primary btn-block btn-flat">Log In</button>
                        </div>
                        <!-- /.col -->
                        <div class="social-auth-links text-center">
                            <p>- OR -</p>
                            <a href="{{URL::route('face')}}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                                Facebook</a>
                            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                                Google+</a>
                            <a href="#" class="btn btn-block btn-social btn-linkedin btn-flat"><i class="fa fa-linkedin"></i> Sign in using
                                LinkedIn</a>

                        </div>

                    </div>
                </form>

                <!-- /.social-auth-links -->

                <a href="{{URL::route('forgotpassword')}}"class="text-center">I forgot my password</a><br>
                <a href="{{URL::route('registration')}}" class="text-center">Register a new membership</a>

            </div>
            <!-- /.login-box-body -->
        </div>

    </body>
</html>