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
                
                <script src="{{asset('js/progress.js')}}"></script>
           
                  <link rel="stylesheet" href="{{asset('/css/FileStyles.css')}}">
                 

    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Admin</b>LTE</a>

            </div>

            <div class="login-box-body">
                <p class="login-box-msg">File Upload Progress Bar Example</p>

                <form action="{{URL::route('upload')}}" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                    <div class='formarea'>
                       
                         <div class="form-group has-feedback">
                       
                        <input type='file' name='file' id="file" />
                       
         <span class="error" id="file_error"></span>
                         </div>  
                        
                        <div id="bararea">
                            <div id="bar"></div>
                        </div>
                        <div id='percent'></div>
                        <div id='status'></div>
                    </div>
                     <input type="submit" name="upload" id="upload" class="btn btn-primary btn-sm" value="Upload"/>
      
                        
                </form>

                    <!-- /.social-auth-links -->

            </div>
            <!-- /.login-box-body -->
        </div>

    </body>
    
</html>