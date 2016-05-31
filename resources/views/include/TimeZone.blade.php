@extends('Layout.app')
@section('content')  
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('../../extensions/Editor/css/editor.dataTables.min.css')}}">
<link href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="{{asset('/js/jquery.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../extensions/Editor/js/dataTables.editor.min.js"></script>
<script>

var Data =<?php echo $result; ?>;
$(document).ready(function () {

    $('#timezone').DataTable({
        data: Data,
        columns: [
            {title: "Id", data: "Id"},
            {title: "name", data: "name"},
            {title: "offset", data: "offset"},
        ]
    });
    var table = $('#timezone').DataTable();
//
//
//    $('#timezone tbody').on('click', 'tr', function () {
//        if ($(this).hasClass('selected')) {
//            $(this).removeClass('selected');
//        } else {
//            table.$('tr.selected').removeClass('selected');
//            $(this).addClass('selected');
//        }
//    });
//
//    $('#button').click(function () {
//        table.row('.selected').remove().draw(false);
//    });

    $('#timezone tbody').on('click', 'tr', function () {
        var data = table.row(this).data();
        //alert('You clicked on ' + data[0] + '\'s row');
        window.location.href = "{{URL::route('onzone')}}";
    });


});
</script>


        <div class="login-box-body">
            <p class="login-box-msg">File Upload Progress Bar Example</p>

            <form  method="post" action="{{URL::route('onzone')}}"  enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                <table id="timezone" class="display" width="100%">

                </table>
            </form>

            <!-- /.social-auth-links -->

        </div>
        <!-- /.login-box-body -->
    </div>
@endsection