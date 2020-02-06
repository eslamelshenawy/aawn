@extends('front.layouts.app2')
@section('styles')
    <style media="screen">
        .form-control:focus{
            outline: none;
            border:0;
            box-shadow: none;
        }
    </style>
@endsection
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
                   <a href="{{ url('/interest') }}"> <span> {{ trans('admin.my_important') }}  </span> </a>
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
                      <h2 class="h2 text-center">{{ trans('admin.my_important') }}</h2>
                    </div>
                    <!-- wishlist  -->
                        <div class="card-body ">
                            <div class="row">
                                <form class="" action="{{ url('/interest/store') }}" method="post" style="display:contents">
                                    {!! csrf_field() !!}
                                    @foreach ($departments as $department)
                                        <div class="col-12 col-md-4 awn-card__body">
                                            <div class="card-item">
                                                <h4 class="card-item__title">
                                                    <input type="checkbox" class="form-control" name="department_id[]"
                                                     value="{{ $department->id }}" {{ in_array($department->id,$interests) ? 'checked' : '' }}>
                                                    <br /> {{ $department->ar_name }}
                                                </h4>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-12 col-md-12 awn-card__body">
                                        <button type="submit" class="btn btn-success" style="display:block; margin:auto;">{{ trans('admin.save') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end wishlist  -->
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
