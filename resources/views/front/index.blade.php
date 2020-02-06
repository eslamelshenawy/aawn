@extends('front.layouts.app')
@section('styles')
<style media="screen">
    .header .side-header__slider .owl-stage{
        height:501px !important;
    }
</style>
@endsection
@section('content')
    <div id="msg"></div>
    <div class="side-header">
      <div class="container">
        <div class="row mt-4">
          <div class="col-4 d-none d-lg-block">
            <div class="awn-card side-header__menu side-header__card">
              <nav>
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('products/1') }}">
                      <i class="material-icons">
                        wb_sunny
                      </i>
                      {{ trans('admin.Offers Ads') }}
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('products/2') }}">
                      <i class="material-icons">
                        loyalty
                      </i>
                      {{ trans('admin.Needs Ads') }}</a
                    >
                  </li>
                  <li class="nav-item nav-item-dropdown">
                    <a class="nav-link " href="#">
                      <i class="material-icons">
                        featured_video
                      </i>
                      {{ trans('admin.Ads') }}
                      <i class="material-icons drop-icon">
                        keyboard_arrow_down
                      </i>
                    </a>
                    <div class="awn-dorpdown-items awn-card display-none">
                      <ul class="main-menu p-4">
                         @foreach (mainDepartment() as $department)
                              <li>
                                <a href="#"> {{ $department->ar_name }} </a>
                                @if (!empty(subDepartment($department->id)))
                                    <ul class="sub-menu awn-card display-none">
                                        @foreach (subDepartment($department->id) as $sub)
                                            <li><a href="{{ url('products/3/'.$sub->id) }}"> {{ $sub->ar_name }} </a></li>
                                        @endforeach
                                    </ul>
                                @endif
                              </li>
                          @endforeach
                      </ul>
                  </div>
                  <li class="nav-item">
                    <a class="nav-link " href="{{ url('/list') }}">
                      <i class="material-icons">
                        star
                      </i>
                      {{ trans('admin.events') }}</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="{{ url('/agent') }}">
                      <i class="material-icons">
                        featured_video
                      </i>
                      {{ trans('admin.agents') }}</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="{{ url('/about') }}">
                      <i class="material-icons">
                        star
                      </i>
                      {{ trans('admin.About Us') }}</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="{{ url('/contact') }}">
                      <i class="material-icons">
                        phone
                      </i>
                      {{ trans('admin.contact') }}</a
                    >
                  </li>
                </ul>
              </nav>
            </div>
            <div class="awn-card side-header__search side-header__card mt-3">
              <div class="search-title">
                <i class="material-icons">
                  search
                </i>
                <h4>{{ trans('admin.search for medical instruments') }}</h4>
              </div>
              <div class="search-body">
                 <form class="" action="{{ url('/products/3') }}" method="get">
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
                <select class="form-control" name="dep_id">
                  <option>{{ trans('admin.department') }}</option>
                  @foreach (getDept() as $dept)
                      <optgroup label="{{ $dept->ar_name }}">
                          @if (!empty($dept->department))
                              @foreach ($dept->department as $department)
                                  <option value="{{ $department->id }}">{{ $department->ar_name }}</option>
                              @endforeach
                          @endif
                      </optgroup>
                  @endforeach
                </select>
              </div>
              <div class="search-btn">
                <button class="btn btn-primary" type="submit">{{ trans('admin.search') }}</button>
              </div>
          </form>
            </div>
          </div>
          <div class="col-12 col-lg-8 side-header__slider">
            <div class="awn-card p-2">
              <div class="owl-carousel owl-carousel-header owl-theme">
                <div class="item slider-item">
                  <img
                    class="lazzy"
                    src="{{ asset('front/assets/imgs/main/placeholder-slider.svg')}}"
                    alt=""
                  />
                </div>
                <div class="item slider-item">
                  <img
                    class="lazzy"
                    src="{{ asset('front/assets/imgs/main/placeholder-slider.svg')}}"
                    alt=""
                  />
                </div>
                <div class="item slider-item">
                  <img
                    class="lazzy"
                    src="{{ asset('front/assets/imgs/main/placeholder-slider.svg')}}"
                    alt=""
                  />
                </div>
                <div class="item slider-item">
                  <img
                    class="lazzy"
                    src="{{ asset('front/assets/imgs/main/placeholder-slider.svg')}}"
                    alt=""
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
    <main>
     <section class="instructions">
       <div class="container">
         <div class="row">
           <div class="awn-card p-3 instructions-item">
             <i>
               <img
                 class="lazzy"
                 src="{{ asset('front/assets/imgs/icons/instru-1.svg')}}"
                 alt="help awn steps"
             /></i>
             <span>Here Some text </span>
           </div>

           <div class="awn-card p-3 instructions-item">
             <i>
               <img
                 class="lazzy"
                 src="{{ asset('front/assets/imgs/icons/instru-2.svg')}}"
                 alt="help awn steps"
             /></i>
             <span>Here Some text </span>
           </div>

           <div class="awn-card p-3 instructions-item">
             <i>
               <img
                 class="lazzy"
                 src="{{ asset('front/assets/imgs/icons/instru-3.svg')}}"
                 alt="help awn steps"
             /></i>
             <span>Here Some text </span>
           </div>

           <div class="awn-card p-3 instructions-item">
             <i>
               <img
                 class="lazzy"
                 src="{{ asset('front/assets/imgs/icons/instru-4.svg')}}"
                 alt="help awn steps"
             /></i>
             <span>Here Some text </span>
           </div>
         </div>
       </div>
     </section>
     <section class="new-instruments mt-4 full-sec">
       <div class="container">
         <div class="row">
           <div class="col-12">
             <div class="awn-card">
               <div class="awn-card__Header ">
                 <h2 class="h2">{{ trans('admin.new added medical instruments') }}</h2>
                 <a href="{{ url('products/1') }}" class="card-link">
                   {{ trans('admin.Show All') }}
                 </a>
               </div>
               <div class="awn-card__body">
                 <div
                   class="card-items card-items-slider owl-carousel owl-carousel-products"
                 >
                 @foreach ($products as $product)
                     <!-- single product  -->
                     <div class="card-item">
                         @if ($product->new)
                             <span class="new-patch">{{ trans('admin.new') }}</span>
                         @endif
                         <div class="card-item__img">
                             <img
                             class="lazzy"
                             src="{{ asset('upload/products/'.$product->products_gallary['0']->media)}}"
                             alt="item title here"
                             />
                         </div>
                         <h4 class="card-item__title" style="min-height:75px;">
                             {{ $product->ar_title }}
                         </h4>
                         <div class="card-item__btns">
                             <a href="{{url('/prod/show/'.$product->id)}}" class="btn btn-outline-primary"
                             >{{ trans('admin.see offer') }}</a
                             >
                             <a href="#" onclick="Favourite({{ $product->id }})" class="btn btn-fav btn-outline-primary">
                                 <i class="material-icons">{{ getFavourite($product->id) }}</i>
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

     <section class="new-needs mt-4 full-sec">
       <div class="container">
         <div class="row">
           <div class="col-12">
             <div class="awn-card">
               <div class="awn-card__Header ">
                 <h2 class="h2">{{ trans('admin.new needs medical instruments') }}</h2>
                 <a href="{{ url('products/2') }}" class="card-link">
                   {{ trans('admin.Show All') }}
                 </a>
               </div>
               <div class="awn-card__body">
                 <div
                   class="card-items card-items-slider owl-carousel owl-carousel-products"
                 >
                 @foreach ($orders as $order)
                     <!-- single order  -->
                     <div class="card-item">
                         @if ($order->new)
                             <span class="new-patch">{{ trans('admin.new') }}</span>
                         @endif
                         <div class="card-item__img">
                             <img
                             class="lazzy"
                             src="{{ asset('upload/products/'.$order->products_gallary['0']->media)}}"
                             alt="item title here"
                             />
                         </div>
                         <h4 class="card-item__title" style="min-height:75px;">
                             {{ $order->ar_title }}
                         </h4>
                         <div class="card-item__btns">
                             <a href="{{url('/prod/show/'.$order->id)}}" class="btn btn-outline-secondary"
                             >{{ trans('admin.see offer') }}</a
                             >
                             <a href="#" onclick="Favourite({{ $order->id }})" class="btn btn-fav btn-outline-secondary">
                                 <i class="material-icons">{{ getFavourite($order->id) }}</i>
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



     <section class="event-sec mt-4">
       <div class="container">
         <div class="row">
           <div class="col-12">
             <h3 class="text-center section-header">{{ trans('admin.events') }}</h3>
           </div>
         </div>
         <div class="row">
             @foreach ($news as $n)
           <div class="col-12 col-md-4">
             <div class="awn-card">
               <div class="awn-card__header-img">
                 <img src="{{ asset('upload/products/'.$n->news_gallary['0']->media)}}" alt="event image" />
               </div>
               <div class="awn-card__inner-icons">
                 <div class="awn-card__inner-icons-item">
                   <i class="material-icons">
                     event_note
                   </i>
                   {{ date('Y-m-d',strtotime($n->date ?? $n->created_at)) }}
                 </div>
                 <div class="awn-card__inner-icons-item">
                   <i class="material-icons">
                     where_to_vote
                   </i>
                  {{ $n->city->country_name_ar ?? "" }} - {{ $n->country->country_name_ar ?? "" }}
                 </div>
               </div>
               <div class="awn-card__body ">
                 <h4 class="card-item__inner-title">
                  {{ $n->ar_title }}
                 </h4>
               </div>
               <div class="card-item__btns">
                 <a href="{{ url('/news/'.$n->id) }}" class="btn btn-secondary">{{ trans('admin.see more') }}</a>
               </div>
             </div>
           </div>
       @endforeach
         </div>
       </div>
     </section>

     <!-- <section class="header-sec text-center">
       <div class="container">
         <div class="row">
           <div class="col-12">
             <div class="awn-card__header">
               <h2 class="p-2 h4">الاعلانات</h2>
             </div>
           </div>
         </div>
       </div>
     </section> -->

     <section class="small-sec">
       <div class="container">
         <div class="row">
         @foreach ($categories as $category)
              @if (!@empty($category->department[0]->products_dep))
             <div class="col-12 col-md-6 mt-4">
                 <div class="awn-card awn-card-four">
                     <div class="awn-card__Header card-blue">
                         <h2 class="h2">{{ $category->ar_name }}</h2>
                         <a href="{{ url('products/3?main_dep_id='. $category->id) }}" class="card-link">
                             {{ trans('admin.Show All') }}
                         </a>
                     </div>
                     <div class="awn-card__body">
                         <div class="row">
                             @foreach ($category->department as $dept)
                             @foreach (array_slice($dept->products_dep->toArray(), 0, 1) as $prod)
                             <div class="col-6">
                                 <div class="card-item">
                                     <div class="card-item__img">
                                         <img
                                         class="lazzy"
                                         src="{{ asset('upload/products/'.$prod['products_gallary']['0']['media'])}}"
                                         alt="item title here"
                                         />
                                     </div>
                                     <h4 class="card-item__title">
                                        {{ $prod['ar_title'] }}
                                     </h4>
                                     <div class="card-item__btns">
                                         <a href="{{url('/prod/show/'.$prod['id'])}}" @if($prod['type'] == '1') class="btn btn-outline-primary" @else class="btn btn-outline-secondary" @endif
                                         >{{ trans('admin.see order') }}</a
                                         >
                                         <a href="#" onclick="Favourite({{ $prod['id'] }})" @if($prod['type'] == '1') class="btn btn-fav btn-outline-primary" @else class="btn btn-fav btn-outline-secondary" @endif>
                                             <i class="material-icons">{{ getFavourite($prod['id']) }}</i>
                                         </a>
                                     </div>
                                 </div>
                             </div>
                             @endforeach
                             @endforeach
                         </div>
                     </div>
                 </div>
             </div>
         @endif
         @endforeach


         </div>
       </div>
     </section>

     <section class="goals mt-4">
       <div class="container">
         <div class="row goals-title">
           <h3>{{ trans('admin.Our Goals') }}</h3>
         </div>
         <div class="row goals-items">
           <div class="col-12 col-md-4 goals-item">
             <div class="goals-item__icon">
               <img
                 class="lazzy"
                 src="{{ asset('front/assets/imgs/icons/goals-1.svg')}}"
                 alt="goals icon"
               />
             </div>
             <div class="goals-item__title">Help Patents</div>
             <div class="goals-item__text">
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
               hic velit consequuntur, porro fugit natus minus!
             </div>
           </div>
           <div class="col-12 col-md-4 goals-item">
             <div class="goals-item__icon">
               <img
                 class="lazzy"
                 src="{{ asset('front/assets/imgs/icons/goals-2.svg')}}"
                 alt="goals icon"
               />
             </div>
             <div class="goals-item__title">Help Patents</div>
             <div class="goals-item__text">
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
               hic velit consequuntur, porro fugit natus minus!
             </div>
           </div>
           <div class="col-12 col-md-4 goals-item">
             <div class="goals-item__icon">
               <img
                 class="lazzy"
                 src="{{ asset('front/assets/imgs/icons/goals-3.svg')}}"
                 alt="goals icon"
               />
             </div>
             <div class="goals-item__title">Help Patents</div>
             <div class="goals-item__text">
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis
               hic velit consequuntur, porro fugit natus minus!
             </div>
           </div>
         </div>
       </div>
     </section>

     <section class="clients-sec">
       <div class="container">
         <div class="row">
           <div class="col-12">
             <div class="owl-carousel-clients owl-carousel">
               <div class="slide-item">
                 <img
                   src="{{ asset('front/assets/imgs/main/client-1.png')}}"
                   alt=" our client logo"
                   class="clients-img lazzy"
                 />
               </div>
               <div class="slide-item">
                 <img
                   src="{{ asset('front/assets/imgs/main/client-2.png')}}"
                   alt=" our client logo"
                   class="clients-img lazzy"
                 />
               </div>
               <div class="slide-item">
                 <img
                   src="{{ asset('front/assets/imgs/main/client-3.png')}}"
                   alt=" our client logo"
                   class="clients-img lazzy"
                 />
               </div>
               <div class="slide-item">
                 <img
                   src="{{ asset('front/assets/imgs/main/client-4.png')}}"
                   alt=" our client logo"
                   class="clients-img lazzy"
                 />
               </div>
               <div class="slide-item">
                 <img
                   src="{{ asset('front/assets/imgs/main/client-1.png')}}"
                   alt=" our client logo"
                   class="clients-img lazzy"
                 />
               </div>
               <div class="slide-item">
                 <img
                   src="{{ asset('front/assets/imgs/main/client-2.png')}}"
                   alt=" our client logo"
                   class="clients-img lazzy"
                 />
               </div>
               <div class="slide-item">
                 <img
                   src="{{ asset('front/assets/imgs/main/client-3.png')}}"
                   alt=" our client logo"
                   class="clients-img lazzy"
                 />
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>
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
