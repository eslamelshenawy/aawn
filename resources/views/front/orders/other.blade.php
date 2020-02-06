@extends('front.layouts.app2')
@section('content')
</div>
   </header>

   <div id="msg"></div>
   <main class="mt-4">
     <section class="breadcrumb-sec mt-2">
       <div class="container">
         <div class="row">
           <div class="col-12">
             <nav aria-label="breadcrumb" class="breadcrumb-content">
               <ol class="breadcrumb">
                 <li class="breadcrumb-item">
                   <a href="{{ url('/') }}"> <span> {{ trans('admin.home') }} </span> </a>
                 </li>
                 <li class="breadcrumb-item">
                   <a href="{{ url('/profile') }}"> <span> {{ trans('admin.dashboard') }}  </span> </a>
                 </li>
                 <li class="breadcrumb-item">
                   <a href="#"> <span> {{ trans('admin.other_order') }}  </span> </a>
                 </li>
               </ol>
             </nav>
           </div>
         </div>
       </div>
     </section>
     <section class="layout-sec mt-5">
       <div class="container">
         <div class="row">

             @foreach ($products as $product)
                 <!--  main content cards   -->
                 <div class="col-12 col-lg-9 main-content"  id="show_{{ $product->id }}">
                     <!-- product main data  -->
                     <div class="awn-card awn-card-hor product-slider">
                         @if ($product->new)
                             <span class="new-patch">{{ trans('admin.new') }}</span>
                         @endif
                         <div class="awn-card__side-img ">
                             <img
                             class="main-img"
                             src="{{ asset('upload/products/'.$product->products_gallary['0']->media)}}"
                             />
                             <div class="light-box d-none">
                                 <img src="{{ asset('upload/products/'.$product->products_gallary['0']->media)}}" />
                                 <i>X</i>
                             </div>
                             <div class="slider-base">
                                 <span class="before btn-slider">
                                     <i class="material-icons">
                                         keyboard_arrow_left
                                     </i>
                                 </span>
                                 <ul class="slider-items">
                                     @foreach ($product->products_gallary as $image)
                                         <li @if($loop->index == '1') class="active-img" @endif>
                                             <img
                                             src="{{ asset('upload/products/'.$image->media) }}"
                                             alt=""
                                             />
                                         </li>
                                     @endforeach

                                 </ul>
                                 <span class="after btn-slider">
                                     <i class="material-icons">
                                         keyboard_arrow_right
                                     </i>
                                 </span>
                             </div>
                         </div>
                         <div class="awn-card__side-content">
                             <div class="side-content-title">
                                <a href="{{ url('/prod/show/'.$product->id) }}" target="_blank"> {{ $product->ar_title }}</a>
                                 @if ($product->price == "0")
                                     <div class="badge badge-success" style="float:left">{{ trans('admin.free') }}</div>
                                 @else
                                     <div class="badge badge-danger" style="float:left">{{ trans('admin.price') }} : {{ $product->price }}</div>
                                 @endif

                             </div>
                             <hr />
                             <div class="side-content-text col-md-12">
                                 {{ str_limit($product->ar_content, $limit = 200, $end = '...') }}
                             </div>
                             <hr />
                             <div class="side-content-data  py-1">
                                 <div class="data-item">
                                     <i class="material-icons">
                                         calendar_today
                                     </i>
                                     <span>{{ date('Y-m-d',strtotime($product->created_at)) }}</span>
                                 </div>
                                 <div class="data-item">
                                     <i class="material-icons">
                                         chat
                                     </i>
                                     <span>{{ date('H:i',strtotime($product->created_at)) }}</span>
                                 </div>
                                 <div class="data-item">
                                     <i class="material-icons">
                                         local_offer
                                     </i>
                                     <span>{{ $product->product_dep->ar_name ?? "" }}</span>
                                 </div>
                             </div>
                             <hr />
                             <div class="side-content-data" >
                                 <a href="{{ url('/edit/'.$product->id) }}" style="color:#fff !important; margin:auto 10px;"  class="btn btn-secondary px-5">{{ trans('admin.edit') }}</a>
                                 <a href="" style="color:#fff !important; margin:auto 10px;" onclick="remove({{ $product->id }})" class="btn btn-danger px-5 mx-3">{{ trans('admin.delete') }}</a>
                                 @if ($product->item->count())
                                     <a href="#" onclick="show({{ $product->id }})" style="color:#fff !important; margin:auto 10px;"  class="btn btn-primary px-5">{{ trans('admin.orders') }}</a>
                                 @endif
                             </div>
                         </div>
                     </div>


                     <!-- people how order product  -->
         <span  id="{{ "o".$product->id }}" style="display:none;">
           <div class="awn-card mb-2">
             <div
               class="awn-card__Header mb-0 h5 bold justify-content-center bg-blue-light color-white"
             >
               {{ trans('admin.orders') }}
             </div>

           </div>
           <!-- single user order  -->
          @foreach ($product->item as $order)
              <div class="awn-card mb-2 single-user">
                  <div class="awn-card__body  d-flex  justify-content-between align-items-center">
                      <div class="users">
                          <div class="users__list">
                              <div class="user">
                                  <div class="user-img">
                                      <img
                                      src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png"
                                      alt="user name img"
                                      />
                                  </div>
                                  <div class="user-data">
                                      <div class="user-data-item ">
                                          <span class="user-icon">
                                              <i class="material-icons">
                                                  person
                                              </i>
                                          </span>
                                          <span class="user-text text-dark ">
                                              <strong>{{ trans('admin.name') }} : </strong>
                                              {{ $order->order_dd->name ?? "" }}
                                          </span>
                                      </div>

                                      <div class="user-data-item ">
                                          <span class="user-icon">
                                              <i class="material-icons">
                                                  email
                                              </i>
                                          </span>
                                          <span class="user-text text-dark ">
                                              <strong>{{ trans('admin.email') }} : </strong>
                                              <a href="mailto:{{ $order->order_dd->email}}">{{ $order->order_dd->email ?? "" }}</a>
                                          </span>
                                      </div>

                                      <div class="user-data-item ">
                                          <span class="user-icon">
                                              <i class="material-icons">
                                                  phone
                                              </i>
                                          </span>
                                          <span class="user-text text-dark ">
                                              <strong>{{ trans('admin.phone') }} : </strong>
                                              <a href="tel:{{ $order->order_dd->phone}}">{{ $order->order_dd->phone ?? "" }}</a>
                                          </span>
                                      </div>

                                      <div class="user-data-item ">
                                          <span class="user-icon">
                                              <i class="material-icons">
                                                  person
                                              </i>
                                          </span>
                                          <span class="user-text text-dark ">
                                              <strong>{{ trans('admin.address') }} : </strong>
                                              {{ $order->order_dd->address ?? "" }}
                                          </span>
                                      </div>


                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="actions  d-flex flex-column ">
                         @if ($order->status == "0")
                             <form class="" action="{{ url('/accept/'.$order->order_id) }}" method="post">
                                 {!! csrf_field() !!}
                                 <button class="btn btn-primary p-1 px-3 my-2" type="submit">{{ trans('admin.accept') }}</button>
                             </form>
                             <form class="" action="{{ url('/refuse/'.$order->order_id) }}" method="post">
                                 {!! csrf_field() !!}
                                 <button class="btn btn-danger p-1 px-3 my-2" type="submit">{{ trans('admin.refuse') }}</button>
                             </form>
                         @elseif ($order->status == "1")
                             <div class="btn btn-success p-1 px-3 my-2">{{ trans('admin.accepted') }}</div>
                             <a href="{{ url('/delivery/'.$order->order_id) }}" class="btn btn-primary p-1 px-3 my-2">{{ trans('admin.shipp_request') }}</a>
                        @else
                            <div class="btn btn-danger p-1 px-3 my-2">{{ trans('admin.refused') }}</div>
                         @endif
                      </div>
                  </div>
              </div>

          @endforeach
           <!-- end single user order  -->
<br /><br />
</span>

                 </div>
                 <!--  end main content cards   -->


                 <!--  Contact Data   -->
                 <div class="col-12 col-md-3"  id="show1_{{ $product->id }}">
                     <div class="awn-card product-side-info ">
                <div class="awn-card__Header p-3 bold h6 px-4">
                  {{ trans('admin.orders_details') }}
                </div>
                <div class="awn-card__body ">
                  <ul class="navbar-nav">
                    <li class="nav-item nav-item-all ">
                      <i class="material-icons">
                        shopping_cart
                      </i>
                      <span class="info-data">
                        <strong>{{ trans('admin.orders_num') }} :</strong>
                        <a href="#" onclick="show({{ $product->id }})">{{ $product->item->count() }}</a>
                      </span>
                    </li>
                    <li class="nav-item nav-item-offers ">
                      <i class="material-icons">
                        thumb_up
                      </i>
                      <span class="info-data">
                        <strong> {{ trans('admin.orders_status') }} : </strong> @if($product->stock > 0) {{ trans('admin.open') }} @else {{ trans('admin.close') }} @endif
                      </span>
                    </li>
                  </ul>
                </div>
              </div>
                     <!--   -->

                 <!--  end Contact Data   -->

                 </div>
                 <!--  end Statsus Data   -->
             @endforeach


         </div>

                      <nav class="awn-pagination mt-4 " style="display:flex; justify-content:center;">
                                 {{ $products->appends(request()->except('page'))->render() }}
                      </nav>
       </div>
     </section>
   </main>
   <input type="hidden" value="{{ csrf_token() }}" id="csrf_token" />
@endsection
@section('scripts')
    <script src="{{ asset('front/assets/js/lightslider.js')}}"></script>
    <script type="text/javascript">
        function remove(id) {
            event.preventDefault();
            $.ajax({
               type:"post",
               url:"{{ url('/products/delete') }}",
               data: {
                               '_token': $('#csrf_token').val(),
                               'id': id,
                },
               success:function(res)
               {
                    $('#show_' + id).remove();
                    $('#show1_' + id).remove();
                    $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#msg').html('<div id="msg" class="alert alert-success">{{ trans('admin.delete Successfully') }}</div>').fadeIn('slow');
                    $('#msg').delay(5000).fadeOut('slow').scrollTop(0);
               }

            });
        }
    </script>

    <script type="text/javascript">
        function show(id) {
            event.preventDefault();
            var id = id;
            $('#o'+id).toggle();
            $('#p'+id).toggle();
        }
    </script>
@endsection
