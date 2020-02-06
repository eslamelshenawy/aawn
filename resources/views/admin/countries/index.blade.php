@extends('admin.index')

{{--@section('title')
    All Users
@endsection--}}
@section('up')
    {{trans('admin.allcountries')}}
@endsection
@section('content')


    <!-- Column selectors -->
    <div class="panel panel-flat">
        <div class="panel-heading">

            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a href="{{aurl('countries/create')}}"><span class="label border-left-primary label-striped">Add Country</span></a>
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
                <th>{{trans('admin.country_name_ar')}}</th>
                <th>{{trans('admin.all_city')}}</th>
                <th>{{trans('admin.edit')}}</th>
                <th> {{trans('admin.delete')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($countries as $country)
                <tr>
                    <td>{{$country->id}}</td>
                    <td>{{$country->country_name_ar}}</td>
                    <td><a href="{{'countries/cities/'.$country->id}}">
                            <i class="icon-eye"></i> <span>{{trans('admin.all_city')}}</span></a></td>
                    <td><a href="{{'countries/edit/'.$country->id}}"><i class="icon-pen6"></i> <span>{{trans('admin.edit')}}</span></a>
                    </td>

                    {!! Form::open(['method'=>'delete','url'=>app('aurl').'/countries/destroy/'.$country->id,'style'=>'display:inline','class'=>'form'.$country->id]) !!}

                    <td>
                        <a type="button" href="#" class="icon-trash" data-toggle="modal" data-target="#modal-danger{{$country->id}}">
                            {{trans('admin.delete')}}
                        </a>
                        <div class="modal modal-danger fade" id="modal-danger{{$country->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">{{trans('admin.ask_to_delete')}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>{{trans('admin.ask_to_delete')}}&hellip;</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">{{trans('admin.no')}}</button>
                                        <button  href="{{url(app('aurl').'/countries/destroy/'.$country->id)}}" type="submit" class="btn btn-outline">{{trans('admin.yes')}}</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </td>

                    {!! Form::close() !!}
                    
                    
                    
                    
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection