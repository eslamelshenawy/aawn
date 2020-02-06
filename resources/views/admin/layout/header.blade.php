<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
            </li>

        </ul>

        <p class="navbar-text"><span class="label bg-success">Online</span></p>

        <ul class="nav navbar-nav navbar-right">
    <li><a href="{{url('/admin')}}" ><i class="icon-home8 "></i></a></li>
            <li class="dropdown language-switch">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    @if(lang() == 'ar')
                        <img src="{{url('/')}}/adminpanel/assets/images/flags/eg.png" class="position-left" alt="">
                        عربى
                        <span class="caret"></span>
                    @else
                        <img src="{{url('/')}}/adminpanel/assets/images/flags/gb.png" class="position-left" alt="">
                        English
                        <span class="caret"></span>
                    @endif
                </a>

                <ul class="dropdown-menu">
                    <li><a href="{{aurl('lang/en')}}" class="english"><img
                                    src="{{url('/')}}/adminpanel/assets/images/flags/gb.png" alt=""> English</a></li>
                    <li><a href="{{aurl('lang/ar')}}" class="russian"><img
                                    src="{{url('/')}}/adminpanel/assets/images/flags/eg.png" alt=""> عربى</a></li>
                </ul>
            </li>



@if(Auth::guard('admin')->user())
<?php $orders  = App\Model\Order::whereNull('seen')->whereHas('item',function($query){
    $query->where('status','1');
})->get()->all(); ?>
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class=" icon-cart"></i>
                        <span class="visible-xs-inline-block position-right">Orders</span>
                        <span class="badge bg-warning-400">{{count($orders) }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-content">
                        <div class="dropdown-content-heading">
الطلبات الجديدة
                            <ul class="icons-list">
                                <li><a href="#"><i class="icon-sync"></i></a></li>
                            </ul>
                        </div>

                        <ul class="media-list dropdown-content-body width-350">
                            @foreach($orders as $order)

                            <li class="media">
                                <div class="media-left">
                                    <a href="{{aurl('orders/details/'.$order->id)}}" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class=" icon-eye"></i></a>
                                </div>
                                <div class="media-body">
                                   كود الطلب : {{$order->code}}
                                      @if(!empty( $order->user()->get()))
                                        @foreach($order->user()->get() as $user)
                                         <div class="media-annotation">اسم العميل : {{ $user->name}}</div>
                                          @endforeach
                                        @endif
                                <div class="media-annotation">الجوال : {{$order->phone}}</div>
                                <div class="media-annotation">                      @if($order->price != 0)
                                        السعر الكلى : {{$order->price}} {{trans('admin.sar')}}
                                @else
                                        السعر الكلى : مجانى
                                @endif
                                </div>
                                <div class="media-annotation">تاريخ الطلب :{{$order->created_at}}</div>
                                </div>
                            </li>

                            @endforeach

                        </ul>

                        <div class="dropdown-content-footer">
                            <a href="{{aurl('orders')}}" data-popup="tooltip" title="كل الطلبات"><i class="icon-menu display-block"></i></a>
                        </div>
                    </div>
                </li>
@else


@endif


            @if(Auth::guard('admin')->user())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class=" icon-newspaper"></i>
                        <span class="visible-xs-inline-block position-right"> {{trans('admin.tickets')}}
</span>
                        <span class="badge bg-warning-400">{{count($SupportTicketss) }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-content">
                        <div class="dropdown-content-heading">
                            {{trans('admin.tickets')}}
                            <ul class="icons-list">
                                <li><a href="#"><i class="icon-sync"></i></a></li>
                            </ul>
                        </div>

                        <ul class="media-list dropdown-content-body width-350">
                            @foreach($SupportTicketss as $ticket)

                                <li class="media">
                                    <div class="media-left">
                                        <a href="{{aurl('tickets/details/'.$ticket->id)}}" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class=" icon-eye"></i></a>
                                    </div>
                                    <div class="media-body">
                                        {{trans('admin.name')}} : {{ $ticket->user_tickets()->first()->name}}


                                        <div class="media-annotation">{{trans('admin.phone')}} : {{$ticket->user_tickets()->first()->phone}}</div>

                                        <div class="media-annotation"> {{trans('admin.date')}} :{{$ticket->created_at}}</div>
                                        <div class="media-annotation">{{trans('admin.agent')}} : {{ $ticket->ticket_agent()->first()->name}}</div>

                                    </div>
                                </li>

                            @endforeach

                        </ul>

                        <div class="dropdown-content-footer">
                            <a href="{{aurl('tickets')}}" data-popup="tooltip" title="{{trans('admin.tickets')}}"><i class="icon-menu display-block"></i></a>
                        </div>
                    </div>
                </li>
            @else


            @endif



            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="assets/images/placeholder.jpg" alt="">
                    <span>@if(Auth::guard('admin')->user()) {{admin()->user()->name}}@else {{ Auth::user()->name }} @endif</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a @if(Auth::guard('admin')->user())  href="{{aurl('logout')}}" @else href="{{ url('/logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            @endif <i class="icon-switch2"></i>
                            {{trans('admin.logout')}}</a>
                    </li>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->
