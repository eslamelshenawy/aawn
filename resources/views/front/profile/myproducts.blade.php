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
                   <a href="#"> <span> {{ trans('admin.My Ads') }}  </span> </a>
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
                   <div class="card-header">
                     <ul class="nav nav-tabs card-header-tabs">
                       <li class="nav-item">
                         <a class="nav-link nav-offers active" href="#">{{ trans('admin.Offers Ads') }}</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link nav-needs " href="#">{{ trans('admin.Needs Ads') }}</a>
                       </li>
                     </ul>
                   </div>
                   @if (!empty($products1) && count($products1) > '0')
                   <!-- offer content  -->
                   <div id="card-offers" class="card-body ">
                     <div class="row">
                         @foreach ($products1 as $offer)
                       <div class="col-12 col-md-4 awn-card__body" id="show_{{ $offer->id }}">
                         <div class="card-item">
                           <div class="card-item__img">
                             <img class="lazzy" src="{{ asset('upload/products/'.$offer->products_gallary['0']->media)}}" alt="item title here">
                           </div>
                           <h4 class="card-item__title">
                             {{ $offer->ar_title }}
                           </h4>
                           <div class="card-item__btns">
                             <a href="{{url('/prod/show/'.$offer->id)}}" class="btn btn-outline-primary">{{ trans('admin.see offer') }}</a>
                             <a href="{{ url('/edit/'.$offer->id) }}"  class="btn btn-outline-primary">
                               <i class="material-icons">
                                 edit
                                 <!-- change this to "favorite" when active  -->
                               </i>
                             </a>
                             &nbsp;
                             <a href="#" onclick="remove({{ $offer->id }})" class="btn btn-outline-primary">
                               <i class="material-icons">
                                 delete
                                 <!-- change this to "favorite" when active  -->
                               </i>
                             </a>
                           </div>
                         </div>
                       </div>
                       @endforeach
                     </div>
                   </div>
               @endif
                   <!-- end offer content  -->
                   <!-- needs content  -->
                @if (!empty($products2) && count($products2) > '0')
                   <div id="card-needs" class="card-body d-none">
                     <div class="row">
                         @foreach ($products2 as $order)
                       <div class="col-12 col-md-4 awn-card__body" id="show_{{ $order->id }}">
                         <div class="card-item">
                           <div class="card-item__img">
                             <img class="lazzy" src="{{ asset('upload/products/'.$order->products_gallary['0']->media)}}" alt="item title here">
                           </div>
                           <h4 class="card-item__title">
                             {{ $order->ar_title }}
                           </h4>
                           <div class="card-item__btns">
                             <a href="{{url('/prod/show/'.$order->id)}}" class="btn btn-outline-secondary">{{ trans('admin.see offer') }}</a>
                             <a href="{{ url('/edit/'.$order->id) }}"  class="btn btn-outline-secondary">
                               <i class="material-icons">
                                 edit
                                 <!-- change this to "favorite" when active  -->
                               </i>
                             </a>
                             &nbsp;
                             <a href="#" onclick="remove({{ $order->id }})" class="btn btn-outline-secondary">
                               <i class="material-icons">
                                 delete
                                 <!-- change this to "favorite" when active  -->
                               </i>
                             </a>
                           </div>
                         </div>
                       </div>
                       @endforeach

                     </div>
                   </div>
               @endif
                   <!--end needs content  -->
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
    <script>
      $(function () {
        $(".nav-offers").on("click" , function(e) {
          e.preventDefault();
          $("#card-offers").removeClass('d-none');
          $(".nav-offers").addClass('active');

          $("#card-needs").addClass('d-none');
          $(".nav-needs").removeClass('active');
        });
        $(".nav-needs").on("click" , function(e) {
          e.preventDefault();
          $("#card-needs").removeClass('d-none');
          $(".nav-needs").addClass('active');

          $("#card-offers").addClass('d-none');
          $(".nav-offers").removeClass('active');

        });



      })
    </script>
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
                    $('html, body').animate({scrollTop: '0px'}, 300);
                    $('#msg').html('<div id="msg" class="alert alert-success">{{ trans('admin.delete Successfully') }}</div>').fadeIn('slow');
                    $('#msg').delay(5000).fadeOut('slow').scrollTop(0);
               }

            });
        }
    </script>
@endsection
