@extends('front.layouts.app2')
@section('styles')
    @if (session()->get('lang') == "ar")
        <style media="screen">
        .form-check{
            padding-right: 1.25rem;
            padding-left: auto;
            float: right;
        }
        .form-check-input {
            margin-right: -1.25rem;
            margin-left: auto;
        }
        </style>
    @endif
@endsection
@section('content')
</div>
 </header>
 <!-- End header for large screens  -->
 <main>
   <section class="login-sec my-5">
     <div class="container">
       <div class="row justify-content-center">
         <div class="col-12 col-md-8">
           <div class="awn-card br-t">
             <div class="awn-card__body br-t ">
               <div class="row justify-content-center">
                 <form class="form-account col-12 col-md-8" method="post" action="{{ url('/register/store') }}">
                     {{ csrf_field() }}
                     <h4
                       class="h3 mb-4 mt-5 font-weight-normal text-center"
                     >
                       {{ trans('auth.Sign Up') }}
                     </h1>
                     <div class="social-login my-3">
                       <a class="btn facebook-btn social-btn" style="color:white" href="{{ url('/login/facebook') }}" type="button">
                         <span  style="color:white"
                           ><i class="social-login-icon">
                               <img src="{{ asset('front/assets/imgs/icons/facebook-base.svg')}}" alt="facebook icon">
                           </i> {{ trans('auth.Sign Up with Facebook') }}</span
                         >
                     </a>
                       <a class="btn twitter-btn social-btn" style="color:white" href="{{ url('/login/twitter') }}" type="button">
                         <span  style="color:white"
                           ><i class="social-login-icon">
                               <img src="{{ asset('front/assets/imgs/icons/twitter-base.svg')}}" alt="twitter login">
                           </i> {{ trans('auth.Sign Up with Twitter') }}</span
                         >
                     </a>
                     </div>
                     <p class="text-center mb-2">{{ trans('auth.OR') }}</p>
                     <input
                       type="text"
                       id="inputEmail"
                       class="form-control mb-2"
                       placeholder="{{ trans('auth.Full Name') }}"
                       required="required"
                       name="name"
                       value="{{ old('name') }}"
                       autofocus=""
                     />
                     <input
                       type="email"
                       id="inputEmail"
                       class="form-control mb-2"
                       placeholder="{{ trans('auth.Email') }}"
                       required="required"
                       name="email"
                       autofocus=""
                       value="{{ old('email') }}"
                     />
                     <input
                       type="number"
                       id="inputEmail"
                       class="form-control mb-2"
                       placeholder="{{ trans('admin.mobile') }}"
                       name="phone"
                       autofocus=""
                       value="{{ old('phone') }}"
                     />
                     <input
                       type="password"
                       id="inputPassword"
                       class="form-control mb-2"
                       placeholder="{{ trans('auth.Password') }}"
                       required="required"
                       name="password"
                     />
                     <input
                       type="password"
                       id="inputPassword"
                       class="form-control mb-2"
                       placeholder="{{ trans('auth.Confirm Password') }}"
                       required="required"
                       name="password_confirmation"
                     />
                     <select class="form-control" id="country" required name="main_country_id" style="margin-bottom:7px;">
                         <option value="">{{ trans('admin.country') }}</option>
                         @foreach (getCountry() as $country)
                             <option value="{{$country->id}}" >
                                 {{$country->country_name_ar}}
                             </option>
                         @endforeach
                     </select>
                     <select class="form-control" name="country_id" id="city">

                     </select>
                     <br />

                     <div class="form-group form-check mb-3">
                       <input type="checkbox" required name="accept" class="form-check-input" id="exampleCheck1">
                       <label class="form-check-label" for="exampleCheck1">{{ trans('auth.I accept') }} <a href="#" class="a-bold">{{ trans('auth.Terms & Conditions') }}</a> </label>
                     </div>

                     <button class="btn btn-success btn-block" type="submit">
                       <i class="fas fa-sign-in-alt"></i> {{ trans('auth.Sign Up') }}
                     </button>
                     <hr />
                     <p>{{ trans('auth.You have an account!') }}</p>
                     <a href="{{ url('/login') }}"
                       class="btn  btn-block"
                     >
                       <i class="fas fa-user-plus"></i> {{ trans('auth.login') }}
                 </a>
                     <div class="mb-5"></div>
                   </form>
               </div>
             </div>
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
