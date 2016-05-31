        
@extends('Layout.app')
@section('content')
<div class="col-md-6 col-md-offset-3">           
    @if ( session()->has('update') )
    <div class="alert alert-info">{{ session()->get('update') }}</div>
    @endif

    <div class="register-box-body">
        <form  method="post" action='{{URL::route('onupdates')}}'>


            <div class="form-group has-feedback">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <label>FullName </label>
                <input type="text"  class="form-control" name="FullName"   value='{{$temp['FullName']}}' id="fullname">

            </div>
            <div class="form-group has-feedback">
                <label>Address</label>
                <textarea  class="form-control "name="Address" value="" >{{$temp['Address']}}</textarea>
            </div>
            <div class="form-group has-feedback">
                <label>City</label>
                <input type="text"  class="form-control" name="City" value='{{$temp['City']}}' id="city">
            </div>
            <div class="form-group has-feedback">
                <label>State</label>
                <input type="text" class="form-control"
                       value='{{$temp['State']}}'  name="State"selected >

            </div>
            <div class="form-group has-feedback">
                <label>PhoneNumber</label>
                <input type="tel"  name="Phonenumber" class="form-control" value='{{$temp['PhoneNumber']}}'>
            </div>
            <div class="form-group has-feedback">
                <label>Email</label>
                <input type="email" name="Email" value='{{$temp['EmailId']}}' class="form-control" >
            </div>
            <div class="form-group has-feedback">
                <label>CreditCardNumber</label>
                <input type="text" name="CreditCardNumber"  class="form-control" >
            </div>
            <div class="row">

                <div class="col-xs-4">
                    <a href=""><input type="submit" value="UPDATE"   class="btn btn-primary btn-block btn-flat"></a>

                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
</div>
@endsection