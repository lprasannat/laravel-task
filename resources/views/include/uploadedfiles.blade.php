@extends('Layout.app')
@section('content')
<link href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet">
       
<script src="{{asset('/js/jquery.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

<script>
var Data =<?php echo $result; ?>;
$(document).ready(function () {

    $('#example').DataTable({
        data: Data,
        columns: [
            {title: "Id", data: "Id"},
            {title: "File", data: "File"},
            {title: "Type", data: "Type"},
            {title: "Size", data: "Size"}
        ]
    });
    var table = $('#example').DataTable();




});
</script>
            <form  method="post" action=""  enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                <table id="example" class="display"">

                </table>
            </form>
            <!-- /.social-auth-links -->   </div>
        <!-- /.login-box-body -->
    </div>
    @endsection