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
                   <a href="#"> <span> {{ trans('admin.edit') }}  </span> </a>
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
               <div class="col-12 col-lg-9">
                   <div class="awn-card br-t">
                     <div class="awn-card__Header">
                       <h2 class="h2">{{ trans('admin.Add New Add') }}</h2>
                     </div>
                     <div class="awn-card__body br-t p-md-4 ">
                       <div class="row justify-content-center">

                         <form class="col-12" method="post" enctype="multipart/form-data" action="{{ url('/update/'.$edit->id) }}">
                             {!! csrf_field() !!}
                           <div class="form-row">
                             <!--   -->
                             <div class="form-group col-12 col-md-6">
                               <label for="exampleFormControlSelect1">{{ trans('admin.Ad Type') }}</label>
                               <select class="form-control" required name="type" id="exampleFormControlSelect1">
                                 <option value="1" {{ $edit->type == '1' ? 'selected' : '' }}>{{ trans('admin.Offers Ads')}}</option>
                                 <option value="2" {{ $edit->type == '2' ? 'selected' : '' }}>{{ trans('admin.Needs Ads')}}</option>
                               </select>
                             </div>
                             <!--  -->
                             <div class="form-group col-12 col-md-6">
                               <label for="exampleFormControlInput1">{{ trans('admin.title') }}</label>
                               <input type="text" name="ar_title" value="{{ $edit->ar_title }}" required class="form-control" id="exampleFormControlInput1" placeholder="{{ trans('admin.title') }}">
                             </div>
                             <!--   -->
                             @if ($edit->type == '1')
                                 <!--  -->
                                 <div class="form-group col-12 col-md-6">
                                   <label for="exampleFormControlInput1">{{ trans('admin.count') }}</label>
                                   <input type="text" name="stock" value="{{ $edit->stock }}" required class="form-control" id="exampleFormControlInput1" placeholder="{{ trans('admin.count') }}">
                                 </div>
                                 <!--   -->
                                 <!--  -->
                                 <div class="form-group col-12 col-md-6">
                                   <label for="exampleFormControlInput1">{{ trans('admin.price') }}</label>
                                   <input type="text" name="price" value="{{ $edit->price }}" class="form-control" id="exampleFormControlInput1" placeholder="{{ trans('admin.price') }}">
                                 </div>
                                 <!--   -->
                             @endif
                             <div class="form-group col-12 col-md-6">
                               <label for="exampleFormControlSelect1">{{ trans('admin.main_dept') }}</label>
                               <select class="form-control" required id="main" name="main_dep_id">
                                   <option value="">{{ trans('admin.main_dept') }}</option>
                                   @foreach ($departments as $department)
                                       <option value="{{$department->id}}" {{ $department->id == $edit->main_dep_id ? 'selected' : '' }}>
                                           {{$department->ar_name ?? ""}}
                                       </option>
                                   @endforeach
                               </select>
                             </div>
                             <!--   -->
                             <div class="form-group col-12 col-md-6">
                               <label for="exampleFormControlSelect1">{{ trans('admin.sub_dept') }}</label>
                               <select class="form-control" required name="dep_id" id="sub">
                                   @if ($edit->dep_id)
                                       <option value="{{ $edit->dep_id }}">{{ $edit->product_dep->ar_name ?? "" }}</option>
                                   @endif
                               </select>
                             </div>

                             <!--   -->
                             <div class="form-group col-12 col-md-6">
                               <label for="exampleFormControlSelect1">{{ trans('admin.country') }}</label>
                               <select class="form-control" name="main_country_id" required id="country">
                                   <option value="">{{ trans('admin.country') }}</option>
                                   @foreach ($countries as $country)
                                       <option value="{{$country->id}}" {{ $country->id == $edit->main_country_id ? 'selected' : '' }}>
                                           {{$country->country_name_ar ?? ""}}
                                       </option>
                                   @endforeach
                               </select>
                             </div>
                             <!--   -->
                             <div class="form-group col-12 col-md-6">
                               <label for="exampleFormControlSelect1">{{ trans('admin.city') }}</label>
                               <select class="form-control" required name="country_id" id="city">
                                   @if ($edit->country_id)
                                       <option value="{{ $edit->country_id }}">{{ $edit->product_country->country_name_ar ?? "" }}</option>
                                   @endif
                               </select>
                             </div>
                             <!--   -->

                             <div class="col-12"></div>
                             <!--   -->
                             <div class="form-group col-12 ">
                               <label for="exampleFormControlTextarea1">{{ trans('admin.details') }}</label>
                               <textarea class="form-control" name="ar_content" id="exampleFormControlTextarea1" rows="3">{{ $edit->ar_content }}</textarea>
                             </div>
                             <!--   -->
                             <div class="col-12 col-md-6">
                               <label class="">{{ trans('admin.image') }}</label>
                               <br />
                                    @if (!empty($edit->products_gallary))
                                        <div class="container">
                                            <div class="row">
                                        @foreach ($edit->products_gallary as $image)
                                                    <div class="col-4" id="show_{{ $image->id }}">
                                                        <img  class="img-responsive" src="{{ asset('upload/products/'.$image->media) }}" style="height:100px; width:100px;" alt="media" />
                                                        <a href="#" onclick="image({{ $image->id }})">
                                                            <i class="material-icons">delete</i>
                                                        <a/>
                                                    </div>
                                        @endforeach
                                    </div>
                                </div>
                                    @endif
                               <br />
                               <div class="custom-file">
                                 <input type="file"  name="image[]" multiple  class="custom-file-input" id="customFile">
                                 <label class="custom-file-label tx-l" for="customFile">Choose file</label>
                               </div>
                             </div>
                             <!--   -->
                           </div>
                           <button class="btn btn-primary px-5 mt-4" type="submit"> {{ trans('admin.save') }}</button>
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
   <input type="hidden" value="{{ csrf_token() }}" id="csrf_token" />
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

    $('#main').change(function(){
       var cid = $(this).val();
       if(cid){
       $.ajax({
          type:"get",
          url:"{{ url('getdepts/') }}/"+cid,
          success:function(res)
          {
               if(res)
               {
                   $("#sub").empty();
                   $.each(res,function(key,value){
                       $("#sub").append('<option value="'+key+'">'+value+'</option>');
                   });
               }
          }

       });
    }else{
        $("#sub").empty();
    }
    });
    </script>
    <script type="text/javascript">
        function image(id) {
            event.preventDefault();
            $.ajax({
               type:"post",
               url:"{{ url('/image/delete') }}",
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
