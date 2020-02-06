@extends('front.layouts.app2')
@section('styles')
    <link
         rel="stylesheet"
         href="{{ asset('front/assets/plugins/owl/assets/owl.carousel.min.css')}}"
       />
       <link
         rel="stylesheet"
         href="{{ asset('front/assets/plugins/owl/assets/owl.theme.default.min.css')}}"
       />
@endsection
@section('content')
</div>
   </header>
   <div id="msg"></div>
   <div class="mt-4"></div>
   <main class="mt-4">
       <section class="title-sec">
         <div class="container">
           <div class="row">
             <div class="col-12">
               <h1 class="h2 sec-title search-results-header">
                  {{ trans('admin.details') }}
               </h1>
             </div>
           </div>
         </div>
       </section>
       <section class="breadcrumb-sec mt-2">
         <div class="container">
           <div class="row">
             <div class="col-12">
               <nav aria-label="breadcrumb" class="breadcrumb-content">
                 <ol class="breadcrumb">
                   <li class="breadcrumb-item">
                    <a href="{{ url('/') }}"> <span> {{ trans('admin.home') }} </span> </a>
                   </li>
                   @if ($product->type == "1")
                       <li class="breadcrumb-item">
                         <a href="{{ url('products/1') }}"> <span> {{ trans('admin.Offers Ads') }} </span> </a>
                       </li>
                   @else
                       <li class="breadcrumb-item">
                         <a href="{{ url('products/2') }}"> <span> {{ trans('admin.Needs Ads') }} </span> </a>
                       </li>
                   @endif
                   <li class="breadcrumb-item">
                     <a href="#"> <span> {{ $product->ar_title }} </span> </a>
                   </li>
                 </ol>
               </nav>
             </div>
           </div>
         </div>
       </section>

       <section class="layout-sec mt-4">
         <div class="container">
           <div class="row">
             <!--  main content cards   -->
             <div class="col-12 col-lg-9 main-content product-details">
                 <div class="row awn-card awn-card-hor product-slider">
               <!-- product main data  -->
                  @if ($product->new)
                      <span class="new-patch">{{ trans('admin.new') }}</span>
                  @endif

                 <div class="awn-card__side-img-slider">
                   <!--  product slider   -->
                   <div class=" product-slider-row">
                     <div class="product-slider">
                       <div class="main-slider-container">
                         <div
                           id="main-slider"
                           class="owl-carousel main-slider"
                         >

                         @foreach ($product->products_gallary as $image)
                           <div class="item">
                             <img
                               class="main-img" style="cursor:default;"
                               src="{{ asset('upload/products/'.$image->media) }}"
                             />
                           </div>
                           @endforeach
                         </div>
                       </div>
                       <div class="base-slider-container mt-1">
                         <div
                           id="base-slider"
                           class="owl-carousel base-slider"
                         >
                         @foreach ($product->products_gallary as $image)
                           <div  @if($loop->index == '1') class="item active-img" @else class="item" @endif>
                             <img
                               class="base-img"
                               src="{{ asset('upload/products/'.$image->media) }}"
                             />
                           </div>
                           @endforeach
                         </div>
                       </div>
                     </div>
                   </div>
                   <!--  end product slider   -->
                 </div>



                 <div class="awn-card__side-content awn-card__side-content-slider" >
                   <div class="side-content-title">
                    <h1 class="h4">{{ $product->ar_title }}</h4>
                        <div class="data-item data-item-fav">
                            <button class="btn btn-fav"  onclick="Favourite({{ $product->id }})">
                                <i class="material-icons">
                                    <i class="material-icons">{{ getFavourite($product->id) }}</i>
                                </i>
                            </button>
                        </div>
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
                      <span>{{ date('H:i',strtotime($product->created_at)) }} </span>
                    </div>
                    <div class="data-item data-tags">
                      <i class="material-icons">
                        local_offer
                      </i>
                      <div class="tags">
                        <a href="#">{{ $product->product_dep->ar_name ?? "" }}</a>
                      </div>
                    </div>
                  </div>
                  <hr />
                  <span class="data-price" style="margin-right:15px; margin-left:15px;">
                      @if ($product->price == "0")
                          {{ trans('admin.free') }}
                      @else
                          {{ trans('admin.price') }} : {{ $product->price }}
                      @endif
                  </span>
               <!-- product details  -->

             </div>
             <!--  end main content cards   -->
             <div class="card-description ">
               <hr />
               <h3 class="desc-title h4">
                 {{ trans('admin.details') }}
               </h3>
               <div class="side-content-text">
                {{ $product->ar_content }}
               </div>
               <hr />
             </div>

             <div class="cta-card">
               <div class="side-content-data">
                   <form class="" style="width:100%" action="{{ url('/order/'.$product->id) }}" method="post">
                       {!! csrf_field() !!}
                 <button class="btn btn-primary btn-full" type="submit">{{ trans('admin.send_request') }}</button>
                  </form>
               </div>
             </div>

             <div class="light-box d-none">
               <img src="{{ asset('upload/products/'.$product->products_gallary['0']->media)}}" />
               <i>X</i>
             </div>
           </div>
         </div>
             <!--  Contact Data   -->
             <div class="col-12 col-lg-3 product-contact-data">
               <div class="awn-card product-side-info ">
                 <div class="awn-card__Header p-3 bold h6 px-4">
                   {{ trans('admin.contact_details') }}
                 </div>
                 <div class="awn-card__body ">
                   <ul class="navbar-nav">
                       @if ($product->product_vendor)
                           <li class="nav-item nav-item-all ">
                               <i class="material-icons">
                                   phone
                               </i>
                               <span class="info-data">
                                   <strong>{{ trans('admin.mobile') }} :</strong>
                                   <a href="tel:{{ $product->product_vendor->phone ?? "" }}">{{ $product->product_vendor->phone ?? "" }}</a>

                               </span>
                           </li>
                       @endif
                       @if ($product->product_vendor)
                           @if($product->product_vendor->company == "1")
                               <li class="nav-item nav-item-all ">
                                   <i class="material-icons">
                                       wb_sunny
                                   </i>
                                   <span class="info-data">
                                       <strong>{{ trans('admin.company') }}</strong>
                                   </span>
                               </li>
                         @endif
                       @endif
                     <li class="nav-item nav-item-offers ">
                       <i class="material-icons">
                         wb_sunny
                       </i>
                       <span class="info-data">
                         <strong> {{ trans('admin.country') }} : </strong> {{ $product->product_country_main->country_name_ar ?? "" }}
                       </span>
                     </li>
                     <li class="nav-item nav-item-offers ">
                       <i class="material-icons">
                         wb_sunny
                       </i>
                       <span class="info-data">
                         <strong> {{ trans('admin.city') }} : </strong> {{ $product->product_country->country_name_ar ?? "" }}
                       </span>
                     </li>
                     <li class="nav-item nav-item-needs">
                       <i class="material-icons">
                         loyalty
                       </i>
                       <span class="info-data"> <strong> {{ trans('admin.number') }} : </strong> {{ $product->id }} </span>
                     </li>
                   </ul>
                 </div>
               </div>
               <!--   -->
             </div>
             <!--  end Contact Data   -->
           </div>
         </div>
       </section>


       <section class="new-instruments mt-4 full-sec similar-products">
       <div class="container">
         <div class="row">
           <div class="col-12">
             <div class="awn-card">
               <div class="awn-card__Header ">
                 <h2 class="h2">{{ trans('admin.related') }}</h2>

               </div>
               <div class="awn-card__body">
                 <div
                   class="card-items card-items-slider owl-carousel owl-carousel-products"
                 >


                 @foreach ($prods as $prod)
                     <!-- single product  -->
                     <div class="card-item">
                         @if ($prod->new)
                             <span class="new-patch">{{ trans('admin.new') }}</span>
                         @endif
                         <div class="card-item__img">
                             <img
                             class="lazzy"
                             src="{{ asset('upload/products/'.$prod->products_gallary['0']->media)}}"
                             alt="item title here"
                             />
                         </div>
                         <h4 class="card-item__title" style="min-height:75px;">
                             {{ $prod->ar_title }}
                         </h4>
                         <div class="card-item__btns">
                             <a href="{{url('/prod/show/'.$prod->id)}}" @if($prod->type == '1') class="btn btn-outline-primary" @else class="btn btn-outline-secondary" @endif
                             >{{ trans('admin.see offer') }}</a
                             >
                             <a href="#" onclick="Favourite({{ $prod->id }})"  @if($prod->type == '1') class="btn btn-fav btn-outline-primary" @else class="btn btn-fav btn-outline-secondary" @endif>
                                 <i class="material-icons">{{ getFavourite($prod->id) }}</i>
                             </a>
                         </div>
                     </div>
                     <!-- end single product  -->
                 @endforeach



                 </div>
               </div>
             </div>
           </div>
           <!--   -->
         </div>
       </div>
     </section>

       <div class="mb-5"></div>
     </main>

     <input type="hidden" value="{{ csrf_token() }}" id="csrf_token" />
     @endsection
     @section('scripts')
         <script src="{{ asset('front/assets/js/lightslider.js')}}"></script>
         @if(auth()->check())
             <script type="text/javascript">
             function Favourite(id) {
                 event.preventDefault();
                 $.ajax({
                     type:"post",
                     url:"{{ url('/favourite/store') }}",
                     data: {
                         '_token': $('#csrf_token').val(),
                         'product_id': id,
                     },
                     success:function(res)
                     {
                         $('html, body').animate({scrollTop: '0px'}, 300);
                         if(res == '1'){
                             $('#msg').html('<div id="msg" class="alert alert-success">{{ trans('admin.add_favourite') }}</div>').fadeIn('slow');
                         }else{
                             $('#msg').html('<div id="msg" class="alert alert-danger">{{ trans('admin.remove_favourite') }}</div>').fadeIn('slow');
                         }
                         $('#msg').delay(5000).fadeOut('slow').scrollTop(0);
                     }

                 });
             }
             </script>
         @endif
     @endsection
