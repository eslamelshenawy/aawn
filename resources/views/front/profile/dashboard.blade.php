@extends('front.layouts.app2')
@section('content')
</div>
   </header>

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
                   <a href="#"> <span> {{ trans('admin.welcome') }} <strong> {{ auth()->user()->name }} </strong> </span> </a>
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
               <div class="col-12 col-lg-9" style="margin-bottom:100px;">
                 <div class="awn-card ">
                   <div class="awn-card__header p-3">
                     <h3 class="h4 h-mute">
                       {{ trans('admin.Add New Add') }}
                     </h3>
                   </div>
                   <div class="awn-car__body d-flex justify-content-evenly pb-5 pt-4">

                         <a href="{{ url('/product/create/1') }}" class="awn-card awn-card-action border-1 m-2 pull-up bg-blue ">
                           <i class="material-icons">  wb_sunny </i>
                          <span>{{ trans('admin.Add New Offer') }}</span>
                         </a>

                         <a href="{{ url('/product/create/2') }}" class="awn-card awn-card-action border-1 m-2 pull-up bg-green">
                           <i class="material-icons"> loyalty</i>
                           <span>{{ trans('admin.Add New Order') }}</span>
                         </a>
                   </div>
                   <div class="awn-car__body d-flex justify-content-evenly pb-5 pt-4">
                         <a href="{{ url('/my/order') }}" style="min-width:207px;" class="awn-card awn-card-action border-1 m-2 pull-up bg-blue ">
                           <i class="material-icons">  wb_sunny </i>
                          <span>{{ trans('admin.my_order') }}</span>
                         </a>

                         <a href="{{ url('/other/order') }}" style="min-width:207px;" class="awn-card awn-card-action border-1 m-2 pull-up bg-green">
                           <i class="material-icons"> loyalty</i>
                           <span>{{ trans('admin.other_order') }}</span>
                         </a>
                   </div>

                   <div class="awn-car__body d-flex justify-content-evenly pb-5 pt-4">
                         <a href="{{ url('/interest') }}" style="min-width:207px;" class="awn-card awn-card-action border-1 m-2 pull-up bg-blue ">
                           <i class="material-icons">  wb_sunny </i>
                          <span>{{ trans('admin.my_important') }}</span>
                         </a>

                         <form action="{{ url('user/delete') }}" method="post">
                                            @csrf
                                            <button type="submit"  style="min-width:207px;background:#6b1111;" class="awn-card awn-card-action border-1 m-2 pull-up bg-red"><i class="material-icons"> loyalty</i>
                                            <span>{{ trans('admin.delete_member') }}</span></button>
                        </form>
                   </div>
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
