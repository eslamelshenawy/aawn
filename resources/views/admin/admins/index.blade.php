@extends('admin.index')

@section('title')
    All Admin
@endsection

@section('up')
    {{trans('admin.daalladmin')}}
@endsection

@section('content')


    <!-- Column selectors -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{trans('admin.daalladmin')}}</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a href="{{aurl('admins/create')}}"><span class="label border-left-primary label-striped">{{trans('admin.daaddadmin')}}</span></a>
                    </li>
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
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
                <th>Name</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{$admin->id}}</td>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td><a href="{{'admins/edit/'.$admin->id}}"><i class="icon-pen6"></i> <span>edit</span></a></td>
                    <td><a href><i class="icon-trash"></i> <span>delete</span></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /column selectors -->



@endsection