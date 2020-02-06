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
                    <a href="{{ url('/profile') }}"> <span> {{ trans('admin.dashboard') }}  </span> </a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="{{ url('/profile/edit') }}"> <span> {{ trans('admin.Account Setting') }}  </span> </a>
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="main-dashboard mb-4">
        <div class="main-dashboard__content">
          <div class="side-header">
            <div class="container">
              <div class="row mt-4">
                <!-- side nav  -->
                <div class="col-3">
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
                <div class="col-12 col-lg-9">
                    <div class="awn-card br-t">
                      <div class="awn-card__body br-t ">
                        <div class="row justify-content-center">
                          <form class="form-account col-12 col-md-8" method="post" action="{{ route('profile.update') }}">
                              {!! csrf_field() !!}
                              <h4 class="h3 mb-4 mt-5 font-weight-normal text-center">
                                {{ trans('admin.details') }}
                              </h4>


                              <input type="text" id="inputEmail"  name="name" class="form-control mb-2" placeholder="{{ trans('admin.name') }}" value="{{ $edit->name }}" required="" autofocus="">
                              <input type="text" id="inputEmail" name="email" disabled class="form-control mb-2" placeholder="{{ trans('admin.email') }}" value="{{ $edit->email }}"  autofocus="">
                               <input type="number" id="inputEmail" name="phone" class="form-control mb-2" placeholder="{{ trans('admin.phone') }}" value="{{ $edit->phone }}" required="" autofocus="">
                              <input type="text" id="inputEmail" name="address" class="form-control mb-2" placeholder="{{ trans('admin.address') }}" value="{{ $edit->address }}" required="" autofocus="">
                              <select class="form-control" id="country" name="main_country_id" style="margin-bottom:7px;">
                                  <option value="">{{ trans('admin.country') }}</option>
                                  @foreach ($countries as $country)
                                      <option value="{{$country->id}}" {{ $country->id == $edit->main_country_id ? 'selected' : '' }}>
                                          {{$country->country_name_ar}}
                                      </option>
                                  @endforeach
                              </select>
                              <select class="form-control" name="country_id" id="city">
                                  @if ($edit->country_id)
                                      <option value="{{ $edit->country_id }}">{{ $edit->user_country->country_name_ar }}</option>
                                  @endif
                              </select>
                              <br />
                              <button class="btn btn-primary btn-block" type="submit">
                                <i class="fas fa-sign-in-alt"></i> {{  trans('admin.save') }}
                              </button>
                              <hr>
                            </form>
                            @if ($ticket == "0")
                                <form class="form-account col-12 col-md-8" method="post" enctype="multipart/form-data" action="{{ route('profile.agent') }}">
                                    {!! csrf_field() !!}
                                    <h4 class="h3 mb-4 mt-5 font-weight-normal text-center">
                                        {{ trans('admin.agent_report') }}
                                    </h4>
                                    <select class="form-control mb-2" name="agent_id">
                                        @foreach ($agents as $agent)
                                            <option value="{{ $agent->id }}" {{ $agent->id == old('agent_id') ? 'selected' : '' }}>{{ $agent->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="file" name="image"  class="form-control mb-2"  required="required">
                                    <textarea name="message" class="form-control mb-2" rows="8" cols="80" placeholder="{{ trans('admin.message') }}">{{ old('admin.message') }}</textarea>
                                    <button class="btn btn-primary btn-block" type="submit">
                                        <i class="fas fa-sign-in-alt"></i> {{ trans('admin.save') }}
                                    </button>
                                    <div class="mb-5"></div>
                                </form>
                            @else
                                <h6 class="h5 mb-4 mt-5 font-weight-normal text-center" style="color:#FF0000">
                                    {{ trans('admin.agent_accept') }}
                                </h6>
                            @endif

                            <form class="form-account col-12 col-md-8" method="post" action="{{ route('profile.password') }}">
                                {!! csrf_field() !!}
                                <h4 class="h3 mb-4 mt-5 font-weight-normal text-center">
                                  {{ trans('admin.edit password') }}
                                </h4>


                                <input type="password" name="old_password"  class="form-control mb-2" placeholder="{{ trans('admin.old password') }}" required="">
                                <input type="password" name="password" class="form-control mb-2" placeholder="{{ trans('admin.password') }}" required="">
                                <input type="password" name="password_confirmation" class="form-control mb-2" placeholder="{{ trans('admin.password_confirmation') }}" required="">

                                <button class="btn btn-primary btn-block" type="submit">
                                  <i class="fas fa-sign-in-alt"></i> {{ trans('admin.save') }}
                                </button>



                                <div class="mb-5"></div>
                              </form>
                        </div>
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
@endsection
@section('scripts')
    <script type="text/javascript">
    $('#country').change(function(){
       var cid = $(this).val();
       if(cid){
       $.ajax({
          type:"get",
          url:"{{ url('getcities/') }}/"+cid,
          success:function(res)
          {
               if(res)
               {
                   $("#city").empty();
                   $.each(res,function(key,value){
                       $("#city").append('<option value="'+key+'">'+value+'</option>');
                   });
               }
          }

       });
    }else{
        $("#city").empty();
    }
    });
    </script>
@endsection
