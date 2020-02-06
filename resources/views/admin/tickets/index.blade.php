@extends('admin.index')

{{--@section('title')
    All Users
@endsection--}}
@section('up')
    {{trans('admin.tickets')}}
@endsection
@section('content')


    <!-- Column selectors -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"> {{trans('admin.tickets')}}</h5>
            <div class="heading-elements">
                <ul class="icons-list">

                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>



        <table class="table datatable-button-html5-columns">
            <thead>
            <tr>

                 <th>ID</th>
                <th>{{trans('admin.name')}}</th>
                <th>{{trans('admin.city')}}</th>

                <th>{{trans('admin.agent')}}</th>
                <th>{{trans('admin.image')}}</th>
               <th>{{trans('admin.status')}}</th>
                <th>{{trans('admin.apply')}}</th>
               <th>{{trans('admin.tickets_details')}}</th>

            </tr>
            </thead>
            <tbody>
            @foreach($SupportTicketss as $ticket)
           @if($ticket->seen == null)
                <tr class="success">
                   @else

                  <tr>
                    @endif

                    <td>{{$ticket->id}}</td>
                      <td><a href="{{aurl('countries/city_agents/'.$ticket->country_id)}}">{{$ticket->ticket_country()->first()->country_name_ar ?? "" }}</a></td>

                      <td>{{ $ticket->user_tickets()->first()->name}}</td>
                    <td>{{ $ticket->ticket_agent()->first()->name}}</td>
                      <td><img src="{{url('/upload/products/'.$ticket->image)}}" style="width: 150px;height: 150px;" /></td>

                    {!! Form::open(['url'=>app('aurl').'/tickets/status/'.$ticket->id,'method'=>'post']) !!}
                        <td >
                            <select style="width: 300px" class="form-control" name="level">
                                <option value="deserve" @if($ticket->level== 'deserve') selected @endif> {{trans('admin.deserve')}}</option>
                                <option value="not" @if($ticket->level == 'not') selected @endif>{{trans('admin.not_deserve')}}</option>
                            </select></td>
                        <td><button type="submit"><i class="icon-basket"></i> <span>Apply</span></button></td>

                   {!! Form::close() !!}
                      <td><a href="{{aurl('tickets/details/'.$ticket->id)}}"><i class="icon-eye"></i> <span>View</span></a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>



@endsection
