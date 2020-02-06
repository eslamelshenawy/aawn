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
                   <a href="{{ url('/favourite') }}"> <span> {{ trans('admin.My Favourite') }}  </span> </a>
                 </li>
               </ol>
             </nav>
           </div>
         </div>
       </div>
     </section>
     <section class="main-dashboard">
       <div class="main-dashboard__content">
         <div class="side-header">
           <div class="container">
             <div class="row mt-4">
               <!-- side nav  -->
               <div class="col-3 d-none d-md-block">
                 <div class="awn-card side-header__menu side-header__card main-dashboard__content">
                     <nav>
                       <ul class="navbar-nav">
                         <li class="nav-item dash-active">
                           <a class="nav-link" href="{{ url('/profile/dashboard') }}">
                             <i class="material-icons"> dashboard </i>
                             {{ trans('admin.dashboard') }}
                           </a>
                         </li>
                         <hr>
                         <li class="nav-item">
                           <a class="nav-link" href="{{ url('/profile/ads') }}">
                             <i class="material-icons"> loyalty </i>
                             {{ trans('admin.My Ads') }}</a
                           >
                         </li>
                         <li class="nav-item">
                           <a class="nav-link " href="{{ url('/profile/edit') }}">
                             <i class="material-icons">  more_vert </i>
                             {{ trans('admin.Account Setting') }}</a
                           >
                         </li>
                         <li class="nav-item">
                           <a class="nav-link " href="{{ url('/favourite') }}">
                             <i class="material-icons">  favorite_border </i>
                             {{ trans('admin.My Favourite') }}</a
                           >
                         </li>
                         <hr>
                         <li class="nav-item">
                           <a class="nav-link " href="{{ url('/logout') }}">
                             <i class="material-icons"> transit_enterexit </i>
                             {{ trans('admin.logout') }}</a
                           >
                         </li>
                       </ul>
                     </nav>
                 </div>
               </div>
               <!-- end side nav  -->
               <!-- main content  -->
                <div class="col-12 col-lg-9" style="margin-bottom:50px;">
                  <div class="card text-center awn-card">
                    <div class="awn-card__Header justify-content-center ">
                      <h2 class="h2 text-center">{{ trans('admin.My Favourite') }}</h2>
                    </div>
                    <!-- wishlist  -->
                    @if (!empty($favourites) && count($favourites) > '0')
                        <div class="card-body ">
                            <div class="row">
                                @foreach ($favourites as $favourite)
                                    <div class="col-12 col-md-4 awn-card__body" id="show_{{ $favourite->product->id }}">
                                        <div class="card-item">
                                            <div class="card-item__img">
                                                <img class="lazzy" src="{{ asset('upload/products/'.$favourite->product->products_gallary['0']->media)}}" alt="item title here">
                                            </div>
                                            <h4 class="card-item__title">
                                                {{ $favourite->product->ar_title }}
                                            </h4>
                                            <div class="card-item__btns">
                                                <a href="{{url('/prod/show/'.$favourite->product->id)}}" @if($favourite->product->type == '1') class="btn btn-outline-primary" @else class="btn btn-outline-secondary" @endif>{{ trans('admin.see offer') }}</a>
                                                <a href="#" onclick="remove({{ $favourite->product->id }})" @if($favourite->product->type == '1') class="btn btn-outline-primary" @else class="btn btn-outline-secondary" @endif>
                                                    <i class="material-icons">
                                                        delete
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- end wishlist  -->
                    @else
                        <!-- No wishlist  -->
                        <div class="card-body my-5 px-4">
                            <h5 class="card-title">{{ trans('admin.No Saved Products') }}</h5>
                            <p class="card-text">
                                {{ trans('admin.Found something you like? Tap on the heart shaped icon next to the item to add it to your wishlist! All your saved items will appear here.') }}
                            </p>
                            <a class=" btn btn-primary header-btn mt-2" href="{{ url('/') }}">
                                {{ trans('admin.Continue Shopping') }}
                            </a>
                        </div>
                        <!-- end No wishlist  -->
                    @endif



                  </div>
                </div>
                <!-- end main content  -->
             </div>
           </div>
         </div>
       </div>
     </section>
   </main>
   <input type="hidden" value="{{ csrf_token() }}" id="csrf_token" />
@endsection
@section('scripts')
    <script type="text/javascript">
        function remove(id) {
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
                    $('#show_' + id).remove();
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
@endsection
