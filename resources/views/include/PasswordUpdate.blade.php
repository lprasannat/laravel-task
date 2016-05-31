@extends('Layout.app')
@section('content')
<div class="col-md-6 col-md-offset-3"> 
    @if ( session()->has('password') )
    <div class="alert alert-info">{{ session()->get('password') }}</div>
    @endif
    
    
    <div class="register-box-body">
        
        
        <p class="login-box-msg">Change Password</p>

        <form  method="post" action='{{URL::route('onupdatepasswords')}}'>


            <div class="form-group has-feedback">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <label>Password</label>
                <input type="password"  class="form-control" id='password' required=""name="Password">
                <span id='passwordspan'></span>
            </div>
            <div class="row">

                <div class="col-xs-4">
                    <a href=""><input type="submit" value="UPDATE"   class="btn btn-primary btn-block btn-flat"></a>

                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.form-box -->
</div>
@endsection