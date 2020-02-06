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
                   <a href="#"> <span> {{ trans('admin.my_order') }}  </span> </a>
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

             @foreach ($orders as $product)
                 <!--  main content cards   -->
                 <div class="col-12 col-lg-9 main-content"  id="show_{{ $product->order_id }}">
                     <!-- product main data  -->
                     <div class="awn-card awn-card-hor product-slider">
                         @if ($product->shopping->new)
                             <span class="new-patch">{{ trans('admin.new') }}</span>
                         @endif
                         <div class="awn-card__side-img ">
                             <img
                             class="main-img"
                             src="{{ asset('upload/products/'.$product->shopping->products_gallary['0']->media)}}"
                             />
                             <div class="light-box d-none">
                                 <img src="{{ asset('upload/products/'.$product->shopping->products_gallary['0']->media)}}" />
                                 <i>X</i>
                             </div>
                             <div class="slider-base">
                                 <span class="before btn-slider">
                                     <i class="material-icons">
                                         keyboard_arrow_left
                                     </i>
                                 </span>
                                 <ul class="slider-items">
                                     @foreach ($product->shopping->products_gallary as $image)
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
                                <a href="{{ url('/prod/show/'.$product->shopping->id) }}" target="_blank"> {{ $product->shopping->ar_title }}</a>
                                 @if ($product->shopping->price == "0")
                                     <div class="badge badge-success" style="float:left">{{ trans('admin.free') }}</div>
                                 @else
                                     <div class="badge badge-danger" style="float:left">{{ trans('admin.price') }} : {{ $product->shopping->price }}</div>
                                 @endif

                             </div>
                             <hr />
                             <div class="side-content-text col-md-12">
                                 {{ str_limit($product->shopping->ar_content, $limit = 200, $end = '...') }}
                             </div>
                             <hr />
                             <div class="side-content-data  py-1">
                                 <div class="data-item">
                                     <i class="material-icons">
                                         calendar_today
                                     </i>
                                     <span>{{ date('Y-m-d',strtotime($product->shopping->created_at)) }}</span>
                                 </div>
                                 <div class="data-item">
                                     <i class="material-icons">
                                         chat
                                     </i>
                                     <span>{{ date('H:i',strtotime($product->shopping->created_at)) }}</span>
                                 </div>
                                 <div class="data-item">
                                     <i class="material-icons">
                                         local_offer
                                     </i>
                                     <span>{{ $product->shopping->product_dep->ar_name ?? "" }}</span>
                                 </div>
                             </div>
                             <hr />
                             <div class="side-content-data" >
                                 <a href="" style="color:#fff !important; margin:auto 10px;" onclick="remove({{ $product->order_id }})"  class="btn btn-danger btn-full">{{ trans('admin.delete') }}</a>
                                 <a href="{{ url('/delivery/'.$product->order_id) }}" style="color:#fff !important; margin:auto 10px;"   class="btn btn-primary btn-full">{{ trans('admin.shipp_request') }}</a>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!--  end main content cards   -->

                 <!--  Contact Data   -->
                 <div class="col-12 col-md-3"  id="show1_{{ $product->order_id }}">
                     <div class="awn-card product-side-info ">
                         <div class="awn-card__Header p-3 bold h6 px-4">
                             {{ trans('admin.contact_details') }}
                         </div>
                         <div class="awn-card__body ">
                             <ul class="navbar-nav">
                                 @if ($product->shopping->product_vendor)
                                     <li class="nav-item nav-item-all ">
                                         <i class="material-icons">
                                             phone
                                         </i>
                                         <span class="info-data">
                                             <strong>{{ trans('admin.mobile') }} :</strong>
                                             <a href="tel:{{ $product->shopping->product_vendor->mobile ?? "" }}">{{ $product->shopping->product_vendor->mobile ?? "" }}</a>

                                         </span>
                                     </li>
                                 @endif
                                 <li class="nav-item nav-item-offers ">
                                     <i class="material-icons">
                                         wb_sunny
                                     </i>
                                     <span class="info-data">
                                         <strong> {{ trans('admin.city') }} :  </strong> {{ $product->shopping->product_country->country_name_ar ?? "" }}
                                     </span>
                                 </li>
                                 <li class="nav-item nav-item-offers ">
                                     <i class="material-icons">
                                         wb_sunny
                                     </i>
                                     <span class="info-data">
                                         <strong> {{ trans('admin.status') }} : </strong>
                                         @if($product->status == '0') <button class="btn btn-primary">{{ trans('admin.revision') }}</button>
                                         @elseif ($product->status == '1')<button class="btn btn-success"> {{ trans('admin.accepted') }}</button>
                                         @else <button class="btn btn-danger">{{ trans('admin.refused') }}</button> @endif
                                     </span>
                                 </li>
                             </ul>
                         </div>
                     </div>
                     <!--   -->

                 <!--  end Contact Data   -->

                     <!--   -->
                 </div>
                 <!--  end Statsus Data   -->
             @endforeach


         </div>

                      <nav class="awn-pagination mt-4 " style="display:flex; justify-content:center;">
                                 {{ $orders->appends(request()->except('page'))->render() }}
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
               url:"{{ url('/orders/delete') }}",
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
@endsection
