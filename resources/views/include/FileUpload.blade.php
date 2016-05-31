@extends('Layout.app')
@section('content')
<div class="col-md-6 col-md-offset-3">

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
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="//oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>

<script src="{{asset('js/progress.js')}}"></script>

<link rel="stylesheet" href="{{asset('/css/FileStyles.css')}}">

@endsection