@extends('front.layouts.app2')
@section('content')
</div>
 </header>
 <!-- End header for large screens  -->
 <main>
      <section class="login-sec my-5" style="min-height:550px;">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-8">
              <div class="awn-card br-t">
                <div class="awn-card__body br-t ">
                  <div class="row justify-content-center">
                    <form class="form-account col-12 col-md-8" method="post" action="{{ url('/login/store') }}">
                        {{ csrf_field() }}
                        <h4
                          class="h3 mb-4 mt-5 font-weight-normal text-center"
                        >
                          {{ trans('auth.login') }}
                        </h1>
                        <div class="social-login my-3">
                            <a class="btn facebook-btn social-btn" style="color:white" href="{{ url('/login/facebook') }}" type="button">
                              <span style="color:white"
                                ><i class="social-login-icon">
                                    <img src="{{ asset('front/assets/imgs/icons/facebook-base.svg')}}" alt="facebook icon">
                                </i> {{ trans('auth.Sign Up with Facebook') }}</span
                              >
                          </a>
                            <a class="btn twitter-btn social-btn" style="color:white" href="{{ url('/login/twitter') }}" type="button">
                              <span style="color:white"
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
                          placeholder="{{ trans('auth.Email') }}"
                          required="required"
                          name="email"
                          autofocus=""
                          value="{{ old('email') }}"
                        />
                        <input
                          type="password"
                          id="inputPassword"
                          class="form-control mb-2"
                          placeholder="{{ trans('auth.Password') }}"
                          required="required"
                          name="password"
                        />


                        <button class="btn btn-success btn-block" type="submit">
                          <i class="fas fa-sign-in-alt"></i> {{ trans('auth.Sign Up') }}
                        </button>
                        <a href="{{ url('/password/reset') }}" id="forgot_pswd">{{ trans('auth.Forgot password?') }}</a>
                        <hr />
                        <!-- <p>Don't have an account!</p>  -->
                        <a href="{{ url('/register') }}"
                          class="btn btn-primary btn-block"
                        >
                          <i class="fas fa-user-plus"></i> {{ trans('admin.Create Account') }}
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
