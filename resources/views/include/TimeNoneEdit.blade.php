
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

                <form  method="post" action=''>


                    <div class="table-responsive">          
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>offset</th>


                                </tr>
                            </thead>
                            <tbody>                                
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>                   
                    <input type="button" class="btn btn-success" id="Edit" value="Edit"/>
                    <input type="button" class="btn btn-success" id="Delete" value="Delete"/>

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
        <script>


            $(document).ready(function () {
                $("#Edit").click(function () {

                    alert('hi');
                });

            });
                    </script>
        </body>
        </html>