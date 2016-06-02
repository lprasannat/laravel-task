@extends('Layout.app')
@section('content') 
<meta name="google-signin-client_id" content="973828635385-02fb4ta4i35nmf2ftvjpdldtk4kcg1pj.apps.googleusercontent.com">

<script src="{{asset('/js/jquery.js')}}"></script>
<link rel="stylesheet" href="{{asset('../../extensions/Editor/css/editor.dataTables.min.css')}}">
<link href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../extensions/Editor/js/dataTables.editor.min.js"></script>

<div class="box box-success">
    <div class="box-header">
        <i class="glyphicon glyphicon-home"></i>

        <h3 class="box-title">Address</h3>

        <!-- Map Container -->

    </div>
    <div class="box-body chat" id="chat-box">

        <button class="btn btn-info btn-sm" onclick="getLocation()">User Location</button>

        <p id="demo"></p>





        <div class="box-body">
            <div id="googleMap" style="height:380px;"></div>
        </div>
        <!-- /.chat -->
        <div class="box-footer">

        </div>
    </div>
</div>

<!-- Chat box -->
<div class="box box-success">
    <div class="box-header">
        <i class="fa fa-comments-o"></i>

        <h3 class="box-title">Log Details</h3>
{{$data}}

    </div>





</div>

@endsection
