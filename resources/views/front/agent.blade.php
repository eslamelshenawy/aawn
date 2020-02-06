@extends('front.layouts.app2')
@section('content')
</div>
 </header>
 <!-- End header for large screens  -->
 <main class="mt-4">
       <section class="title-sec">
         <div class="container">
           <div class="row">
             <div class="col-12">
               <h1 class="h2 sec-title">
                 {{ trans('admin.agents') }}
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
                   <li class="breadcrumb-item">
                     <a href="#"> <span> {{ trans('admin.agents') }} </span> </a>
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
             <!--  offers type   -->
             <div class="col-12 col-lg-3 offers-filter">
               <h3 class="filter-header h4">{{ trans('admin.search') }}</h3>
               <div class="awn-card awn-card-filter awn-card-filter-type  mt-4 mb-4">
                 <nav>
                   <ul class="navbar-nav">
                     <li class="nav-item nav-item-all  active">
                       <a class="nav-link" href="#">
                         <i class="material-icons">
                           home
                         </i>
                         {{ trans('admin.city') }}
                       </a>

                      <form class="" action="{{ url('/agent') }}" method="get">
                      <select class="form-control" name="city">
                        <option>{{ trans('admin.City') }}</option>
                        @foreach (getCountry() as $country)
                            <optgroup label="{{ $country->country_name_ar }}">
                                @if (!empty($country->city))
                                    @foreach ($country->city as $city)
                                        <option value="{{ $city->id }}">{{ $city->country_name_ar }}</option>
                                    @endforeach
                                @endif
                            </optgroup>
                        @endforeach
                    </select>
                    <div class="search-btn">
                        <br />
                      <button class="btn btn-primary" style="margin:auto; display:block;" type="submit">{{ trans('admin.search') }}</button>
                      <br />
                    </div>
                    </form>
                     </li>
                   </ul>
                 </nav>
               </div>

               <div class="awn-card awn-card-filter awn-card-filter-type  mt-4 mb-4">
                   <nav>
                       <ul>
                           <li style="color:#FF0000; padding:10px;">
                               <h5 style="color:#000">{{ trans('admin.Instructions') }}</h5>
                               {{ trans('admin.must_agent') }}
                           <li>
                       </ul>
                    </nav>
                </div>
               <!--   -->

             </div>
             <!--  end offers type   -->

             <!--  main content cards   -->
             <div class="col-12 col-lg-9 main-content">
                 @if ($agents->count() == "0")
                     <!-- No wishlist  -->
                     <div class="card">
                         <div class="card-body my-5 px-4">
                             <h5 class="card-title text-center">{{ trans('admin.empty_search') }}</h5>
                         </div>
                     </div>
                     <!-- end No wishlist  -->
                @else
                 @foreach ($agents as $agent)
                     <!-- start single agent  -->
                     <div  class="single-product  single-agent">
                         <div class="awn-card ">

                             <div class="awn-card__side-content">
                                 <div class="side-content-title">{{ $agent->name }}</div>
                                 <hr />
                                 <div class="side-content-text">
                                     <ul class="agent-data row">
                                         <li class="col-12 col-md-6">
                                             <i class="material-icons">  email </i>
                                             <strong>{{ trans('admin.email') }} : </strong>
                                             <a href="mailto:{{ $agent->email }}">{{ $agent->email }}</a>
                                         </li>
                                         <li class="col-12 col-md-6">
                                             <i class="material-icons">  phone </i>
                                             <strong>{{ trans('admin.phone') }} : </strong>
                                             <a href="tel:{{ $agent->phone }}">{{ $agent->phone }}</a>
                                         </li>
                                         <li class="col-12 col-md-6">
                                             <i class="material-icons">  assistant_photo </i>
                                             <strong>{{ trans('admin.city') }} : </strong>
                                             <span>{{ $agent->agent_country->country_name_ar ?? "" }} - {{ $agent->agent_main_country->country_name_ar ?? ""  }}</span>
                                         </li>
                                         <li class="col-12 col-md-6">
                                             <i class="material-icons">  home </i>
                                             <strong>{{ trans('admin.address') }} : </strong>
                                             <span>{{ $agent->address }}</span>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- end single agent  -->
                 @endforeach
             @endif



               <!--  pagination   -->
               <nav class="awn-pagination mt-4 ">
                          {{ $agents->appends(request()->except('page'))->render() }}
               </nav>
               <!--  end pagination   -->
             </div>



             <!--  end main content cards   -->

           </div>

         </div>
       </section>

       <div class="mb-5"></div>
     </main>
@endsection
