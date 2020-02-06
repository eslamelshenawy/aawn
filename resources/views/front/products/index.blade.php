@extends('front.layouts.app2')
@section('content')
</div>
   </header>
   <div id="msg"></div>
   <main class="mt-4">
      <section class="title-sec">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h1 class="h2 sec-title search-results-header">
                  @if($main_dep_id)
                      {{$main_dep_name}}
                 @elseif ($city || $dep_id)
                     {{ trans('admin.search_result') }}
                 @elseif ($dept_name)
                     {{ $dept_name }}
                 @else
                     @if($type == '1')
                         {{ trans('admin.Offers Ads') }}
                    @elseif ($type == '2')
                        {{ trans('admin.Needs Ads') }}
                    @else
                        {{ trans('admin.Ads') }}
                    @endif
                 @endif
                 <span>{{ $count }}</span>
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
                              @if($main_dep_id)
                                  <li class="breadcrumb-item">
                                      <a href="#">
                                          <span>
                                              {{$main_dep_name}}
                                          </span>
                                      </a>
                                  </li>
                             @elseif ($city)
                                 <li class="breadcrumb-item">
                                     <a href="#">
                                         <span>
                                             {{ trans('admin.search_result') }}
                                         </span>
                                     </a>
                                 </li>
                             @elseif ($dept_name)
                                 <li class="breadcrumb-item">
                                     <a href="{{ url('/products/3?main_dep_id='.$parent->id) }}">
                                         <span>
                                             {{$parent->ar_name}}
                                         </span>
                                     </a>
                                 </li>
                                 <li class="breadcrumb-item">
                                     <a href="#">
                                         <span>
                                             {{ $dept_name }}
                                         </span>
                                     </a>
                                 </li>
                             @else
                                 <li class="breadcrumb-item">
                                     <a href="#">
                                         <span>
                                             @if($type == '1')
                                                 {{ trans('admin.Offers Ads') }}
                                             @elseif ($type == '2')
                                                 {{ trans('admin.Needs Ads') }}
                                             @else
                                                 {{ trans('admin.Ads') }}
                                             @endif
                                         </span>
                                     </a>
                                 </li>
                             @endif

                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="layout-sec mt-3">
        <div class="container">
          <div class="row">
            <!--  offers type   -->
            <div class="col-12 col-md-3 offers-filter">
              <div class="awn-card awn-card-filter awn-card-filter-type">
                <nav>
                  <ul class="navbar-nav">
                    <li @if($type == '3') class="nav-item nav-item-all active" @else class="nav-item nav-item-all" @endif >
                      <a class="nav-link" href="{{ url('products/3'.getUrl()) }}">
                        <i class="material-icons">
                          photo_library
                        </i>
                        {{ trans('admin.Ads') }}
                      </a>
                    </li>
                    <li @if($type == '1') class="nav-item nav-item-offers active" @else class="nav-item nav-item-offers" @endif>
                      <a class="nav-link" href="{{ url('products/1'.getUrl()) }}">
                        <i class="material-icons">
                          wb_sunny
                        </i>
                        {{ trans('admin.Offers Ads') }}
                      </a>
                    </li>
                    <li @if($type == '2') class="nav-item nav-item-needs active" @else class="nav-item nav-item-needs" @endif>
                      <a class="nav-link" href="{{ url('products/2'.getUrl()) }}">
                        <i class="material-icons">
                          loyalty
                        </i>
                        {{ trans('admin.Needs Ads') }}</a
                      >
                    </li>
                  </ul>
                </nav>
              </div>
              <!--   -->
              @if($main_dep_id)
              <h3 class="h4 mt-5 filter-header">{{ trans('admin.sub_dept') }}</h3>
              <div class="awn-card awn-card-filter awn-card-filter-tags  mt-4">
                <nav>
                  <ul class="navbar-nav">
                      @foreach (subDepartment($main_dep_id) as $sub)
                          <li class="nav-item nav-item-tag ">
                              <a class="nav-link" href="{{ url('/products/3/'.$sub->id) }}">
                                  <i class="material-icons">
                                      layers
                                  </i>
                                  {{ $sub->ar_name }}
                              </a>
                          </li>
                      @endforeach

                  </ul>
                </nav>
              </div>
             @endif


            </div>
            <!--  end offers type   -->

            <!--  main content cards   -->
            <div class="col-12 col-lg-9 main-content">
              <!--
              single-product-need : class for need products - green
              single-product-offer : class for offer products - blue
             -->
             @if ($count == "0")
                 <!-- No wishlist  -->
                 <div class="card">
                     <div class="card-body my-5 px-4">
                         <h5 class="card-title text-center">{{ trans('admin.empty_search') }}</h5>
                     </div>
                 </div>
                 <!-- end No wishlist  -->
            @else
                <div class="row new-single-product-row">
                @foreach ($products as $product)
                    <div class="col-4">
                    @if ($product->type == '1')
                        <a href="{{url('/prod/show/'.$product->id)}}" class="single-product new-single-product single-product-offer ">
                    @else
                        <a href="{{url('/prod/show/'.$product->id)}}" class="single-product new-single-product single-product-need ">
                    @endif
                        <div class="awn-card">
                            @if ($product->new)
                                <span class="new-patch">{{ trans('admin.new') }}</span>
                            @endif
                            <div class="awn-card__side-img">
                                <span class="new-price"> {{ $product->price }} {{ trans('admin.sar') }}</span>
                                <div class="data-item data-item-fav">
                                    <button onclick="Favourite({{ $product->id }})" class="btn btn-fav">
                                        <i class="material-icons">{{ getFavourite($product->id) }}</i>
                                    </button>
                                </div>
                                <img src="{{ asset('upload/products/'.$product->products_gallary['0']->media)}}" alt="" />
                            </div>
                            <div class="awn-card__side-content">
                                <div class="side-content-title">{{ $product->ar_title }}</div>

                                <div class="side-content-data">
                                  <div class="data-item">
                                    <i class="material-icons">
                                      calendar_today
                                    </i>
                                    <span>{{ date('Y-m-d',strtotime($product->created_at)) }}</span>
                                  </div>

                                  <div class="data-item">
                                    <i class="material-icons">
                                      local_offer
                                    </i>
                                    <span>{{ $product->product_dep->ar_name ?? "" }} </span>
                                  </div>
                                </div>

                            </div>
                        </div>
                    </a>
                    </div>
                @endforeach
                </div>
             @endif



              <!--  pagination   -->
              <hr>
              <nav class="awn-pagination mt-4 ">
                         {{ $products->appends(request()->except('page'))->render() }}
              </nav>
              <!--  end pagination   -->
            </div>
            <!--  end main content cards   -->
          </div>
        </div>
      </section>

      <div class="mb-5"></div>
    </main>
    <input type="hidden" value="{{ csrf_token() }}" id="csrf_token" />

@endsection
@section('scripts')
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
                    console.log(res);
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
