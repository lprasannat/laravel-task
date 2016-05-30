<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('/dist/css/AdminLTE.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('/plugins/iCheck/square/blue.css')}}">

        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        <script src="//oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>
        <script type="text/javascript" src="jquery.js"></script>
        <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
        <link href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/css/styles.css')}}">
        <link rel="stylesheet" href="/css/FileStyles.css">

    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Admin</b>LTE</a>

            </div>

            <div class="login-box-body">
                <p class="login-box-msg">EXPORT DATA TO EXCEL FORMAT</p>
                
                <form  method="post" action=""  enctype="multipart/form-data" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="submit" name="export" class="btn btn-success" value="EXPORT">


                </form>

                <!-- /.social-auth-links -->

            </div>
            <!-- /.login-box-body -->
        </div>

    </body>

</html>