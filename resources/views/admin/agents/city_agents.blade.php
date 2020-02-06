@extends('admin.index')

{{--@section('title')
    All agents
@endsection--}}
@section('up')
    {{trans('admin.allagent')}} ({{$city->country_name_ar }})
@endsection
@section('content')


    <!-- Column selectors -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{trans('admin.allagent')}} ({{$city->country_name_ar }})</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a href="{{aurl('agents/create')}}"><span class="label border-left-primary label-striped">{{trans('admin.add')}}</span></a>
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
                <th>{{trans('admin.name')}}</th>
                <th>{{trans('admin.city')}}</th>
                <th>{{trans('admin.location')}}</th>
                <th>{{trans('admin.phone')}}</th>
                <th>{{trans('admin.edit')}}</th>
                <th>{{trans('admin.delete')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($agents as $agent)
                <tr>
                    <td>{{$agent->id}}</td>
                    <td>{{$agent->name}}</td>
                    <td>{{$agent->agent_country()->first()->country_name_ar ?? "" }}</td>
                    <td>{!! $agent->location!!}</td>
                    <td>{{$agent->phone}}</td>
                    <td><a href="{{aurl('agents/edit/'.$agent->id)}}"><i class="icon-pen6"></i> <span>edit</span></a></td>
                    <td><a href><i class="icon-trash"></i> <span>delete</span></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /column selectors -->



@endsection
