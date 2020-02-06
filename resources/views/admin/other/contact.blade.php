@extends('admin.index')

{{--@section('title')
All Users
@endsection--}}
@section('up')
{{trans('admin.orders')}}
@endsection
@section('content')


<!-- Column selectors -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title"> {{trans('admin.allcontact')}}</h5>
    </div>

    <div class="panel-body">
        {{-- All of the data export buttons have a <code>exportOptions</code> option which can be used to specify
        information about what data should be exported and how. In this example the copy button will export column
        index 0 and all visible columns, the Excel button will export only the visible columns and the PDF button
        will export column indexes 0, 1, 2 and 5 only. Column visibility controls are also included so you can
        change the columns easily.--}}
    </div>

    <table class="table datatable-button-html5-columns">
        <thead>
        <tr>
            <th>ID</th>
            <th>{{trans('admin.name')}}</th>
            <th>{{trans('admin.order_status_code')}}</th>
            <th>{{trans('admin.order_details')}}</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{$contact->id}}</td>
            <td>{{$contact->name}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->subject}}</td>
            <td>{{$contact->message}}</td>
            <td><a href="{{url('admin/deletecontact/'.$contact->id)}}}"><i class="icon-trash"></i> <span>delete</span></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>



@endsection