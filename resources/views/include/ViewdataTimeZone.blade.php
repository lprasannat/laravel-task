
@extends('Layout.app')
@section('content')
<table id="timeZone" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>TimeZone Name</th>
            <th>Offset</th>
        </tr>
    </thead>
    <tbody>
        @foreach($User as $value)
        <tr>
            <td>{{$value['Id']}}</td>
            <td>{{$value['name']}}</td>
            <td>{{$value['offset']}}</td>
        </tr> 
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>TimeZone Name</th>
            <th>Offset</th>
        </tr>
    </tfoot>
</table>
@stop






















