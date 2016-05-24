<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Registration Page</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <script type='text/javascript' src='/js/jquery.js'></script>
        <script type='text/javascript' src='/js/AdminJs.js'></script>
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
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="../../index2.html"><b>Admin</b>LTE</a>
            </div>

            <div class="register-box-body">
                <p class="login-box-msg">Registration step1 process</p>

                <form  method="post">
                    <div class="form-group has-feedback">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="text" class="form-control" name="FullName" placeholder="Full name" id="fullname">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        

                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Address">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="city">
                        <span class="glyphicon glyphicon-lock form-control-feedback" ></span>
                     
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="state" >
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                      
                    </div>
                    <div class="row">
                       
                       <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">next</button>
                        </div>
                         <div class="col-xs-4">
                            <button type="button" class="btn btn-primary btn-block btn-flat">back</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <a href="" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.register-box -->

        <!-- jQuery 2.2.0 -->
        <script src="/js/jQuery-2.2.0.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="{{asset('/js/bootstrap.min.js')}}"></script>
        <!-- iCheck -->
        <script src="{{asset('/js/icheck.min.js')}}"></script>
        <script>
$(function () {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
});
        </script>
    </body>
</html>