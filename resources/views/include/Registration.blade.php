
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

        <style>
            span
            {
                color: red;
            }
        </style>
    </head>
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="../../index2.html"><b>Admin</b>LTE</a>
            </div>

            <div class="register-box-body">
                <p class="login-box-msg">Register a new membership</p>

                <form  method="post" action="{{URL::route('registration2')}}">
                    <div class="form-group has-feedback">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="text" class="form-control" name="FullName" placeholder="Full name"  id="fullname">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        <span id="fullspan"></span>

                    </div>
                    <div class="form-group has-feedback">
                        <textarea class="form-control" placeholder="Address"  name='Address'  required id="address"></textarea>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <span id="addressspan"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="city"  name='City' id="city">
                        <span class="glyphicon glyphicon-lock form-control-feedback" ></span>
                        <span id="cityspan"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <select class="form-control" name='State'>
                            <option>Andhra pradesh</option>
                            <option>Telangana</option>
                            <option>Maharastra</option>
                            <option>Karnataka</option>
                            <option>Madya Pradesh</option>
                            <option>Arunachal Pradesh</option>
                            <option>Kasmir</option>
                            <option>Kasi</option>
                        </select>
                        <span id="statespan"></span>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-xs-4">

                            <button type="submit"  id="next" class="btn btn-primary btn-block btn-flat">next</button>
                        </div>
                        <br>
                      
                        <!-- /.col -->
                    </div>
                      @if(isset($success))
                        {{$success}}
                        @endif
                </form>


                <a href="{{URL::route('indlogin')}}" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
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