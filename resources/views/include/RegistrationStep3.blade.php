
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

                <form  method="post" action='{{URL::route('values')}}'>


                    <div class="form-group has-feedback">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <label>FullName </label>
                        <input type="hidden"  name="FullName"   value='{{$temp['FullName']}}' id="fullname">{{$temp['FullName']}}

                    </div>
                    <div class="form-group has-feedback">
                        <label>Address</label>
                        <input type="hidden" name="Address" value="{{$temp['Address']}}" >{{$temp['Address']}}</textarea>
                    </div>
                    <div class="form-group has-feedback">
                        <label>City</label>
                        <input type="hidden"  name="City" value='{{$temp['City']}}' id="city">{{$temp['City']}}
                    </div>
                    <div class="form-group has-feedback">
                        <label>State</label>
                        <input type="hidden"
                               value='{{$temp['State']}}'  name="State"selected >{{$temp['State']}}

                    </div>
                    <div class="form-group has-feedback">
                        <label>PhoneNumber</label>
                        <input type="hidden"  name="Phonenumber" value='{{$temp['PhoneNumber']}}'>{{$temp['PhoneNumber']}}
                    </div>
                    <div class="form-group has-feedback">
                        <label>Email</label>
                        <input type="hidden" name="Email" value='{{$temp['EmailId']}}' >{{$temp['EmailId']}}
                    </div>
                    <div class="row">

                        <div class="col-xs-4">
                            <a href="{{URL::route('registration2')}}"><input type="button" value="back"   class="btn btn-primary btn-block btn-flat"></a>

                        </div>
                        <div class="col-xs-4">

                            <input type="submit"  id ="next" class="btn btn-primary btn-block btn-flat">
                        </div>


                        <!-- /.col -->
                    </div>
                </form>
              
              


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