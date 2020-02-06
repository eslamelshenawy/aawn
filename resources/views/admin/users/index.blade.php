@extends('admin.index')

{{--@section('title')
    All Users
@endsection--}}
@section('up')
    {{trans('admin.daalluser')}}
@endsection
@section('content')


    <!-- Column selectors -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">All Users</h5>
            <div id="msg"></div>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a href="{{aurl('users/create')}}"><span class="label border-left-primary label-striped">Add User</span></a>
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
        <form class="" action="{{ aurl('users/all/delete') }}" method="post">

        {!! csrf_field() !!}
        <table class="table datatable-button-html5-columns">
            <thead>
            <tr>
                <th><input type="checkbox" id="checkAll"><th>
                <th>ID</th>
                <th>{{trans('admin.name')}}</th>
                <th>{{trans('admin.city')}}</th>
                <th>{{trans('admin.email')}}</th>
                <th>{{trans('admin.status')}}</th>
                <th>{{trans('admin.orders')}}</th>
                <th>{{trans('admin.products')}}</th>
                <th>Block IP</th>
                <th>{{trans('admin.edit')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td><input type="checkbox" name="userId[]" value="{{ $user->id }}" /><td>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td><a href="{{aurl('countries/city_agents/'.$user->country_id)}}">{{$user->user_country()->first()->country_name_ar ?? ''}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>
                       @if($user->user_ticket()->first())

                    @if($user->user_ticket()->first()->level == 'deserve')
                    {{trans('admin.deserve')}}
                        @else
                            {{trans('admin.not_deserve')}}
                        @endif
                        @else
                            {{trans('admin.not_deserve')}}
                        @endif
                    </td>
                    <td>{{$user->user_orders()->count() }} {{trans('admin.order')}} </td>
                    <td>{{$user->user_products()->count() }} {{trans('admin.product')}} </td>
                    <td>
                        @if (!$user->block)
                            <a href="#" id="show_{{ $user->id }}" onclick="Block({{ $user->id }})" class="btn btn-warning">Block IP</a>
                        @endif
                    </td>
                    <td><a href="{{'users/edit/'.$user->id}}"><i class="icon-pen6"></i> <span>edit</span></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <input type="hidden" value="{{ csrf_token() }}" id="csrf_token" />
        <br />
        <button type="submit" class="btn btn-danger center-block">{{ trans('admin.delete selected') }}</button>
        <br /><br />
        </form>
        <script type="text/javascript">
        $("#checkAll").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        </script>
        <script type="text/javascript">
        function Block(id) {
            event.preventDefault();
            $.ajax({
                type:"post",
                url:"{{ aurl('users/block') }}",
                data: {
                    '_token': $('#csrf_token').val(),
                    'id': id,
                },
                success:function(res)
                {
                    console.log(res);
                    $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#msg').html('<div id="msg" class="alert alert-success">{{ trans('admin.blocked') }}</div>').fadeIn('slow');
                    $('#show_' + id).hide();
                    $('#msg').delay(5000).fadeOut('slow').scrollTop(0);
                }

            });
        }
    </script>
    </div>
    <!-- /column selectors -->



@endsection
