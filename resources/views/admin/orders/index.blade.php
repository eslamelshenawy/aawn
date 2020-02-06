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
            <h5 class="panel-title">All {{trans('admin.orders')}}</h5>
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
                
                 <th>{{trans('admin.code')}}</th>
                <th>{{trans('admin.name')}}</th>
                <th>{{trans('admin.city')}}</th>
                <th>{{trans('admin.phone')}}</th>
                <th>{{trans('admin.totalprice')}}</th>
               <th>{{trans('admin.status')}}</th>
                <th>{{trans('admin.apply')}}</th>
               <th>{{trans('admin.order_details')}}</th>

            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
           @if($order->seen == 0)
                <tr class="success">
                   @else 

                  <tr>
                    @endif  
                    
                    <td>{{$order->code}}</td>
                   
                       @foreach($order->user()->get() as $user)
                       
                            <td>{{ $user->name}}</td>

                           @endforeach
                     

                    
                       @foreach($order->country()->get() as $country)
                            <td>{{ $country->country_name_ar}}</td>
                           @endforeach
                      
                   
                   
                    <td>{{$order->phone}}</td>
                      @if($order->price == 0)

                      <td>مجانى</td>
                      @else
                          <td>{{$order->price}}</td>
                      @endif
                    {!! Form::open(['url'=>app('aurl').'/orders/status/'.$order->id,'method'=>'post']) !!}
                        <td > <select style="width: 300px" class="form-control" name="level">
                          <option value="prepare" @if($order->level == 'prepare') selected @endif>جارى اعداد المنتج  </option>
                          <option value="ship" @if($order->level == 'ship') selected @endif>تم استلام المنتج من قبل شركة الشحن</option>
                          <option value="done" @if($order->level == 'done') selected @endif>تم شحن المنتج</option>
                          <option value="reject" @if($order->level == 'reject') selected @endif>تم تسليم المنتج</option>
                                <option value="close" @if($order->level == 'close') selected @endif>رفض الطلب</option>

                            </select></td>
                        <td><button type="submit"><i class="icon-basket"></i> <span>Apply</span></button></td>

                   {!! Form::close() !!}
                      <td><a href="{{aurl('orders/details/'.$order->id)}}"><i class="icon-eye"></i> <span>View</span></a>
                    </td>
                </tr>
              
            @endforeach
            </tbody>
        </table>
    </div>



@endsection