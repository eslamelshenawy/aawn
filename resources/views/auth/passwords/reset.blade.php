@extends('front.layouts.app2')
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
              <form class="form-account col-12 col-md-8" method="POST" action="{{ route('password.request') }}">
                  {{ csrf_field() }}
                  <input type="hidden" name="token" value="{{ $token }}">
                  <h4
                    class="h3 mb-4 mt-5 font-weight-normal text-center"
                  >
                    {{ trans('auth.Reset Password') }}
                  </h1>
                  <p class="text-center mb-2">{{ trans('admin.email') }}</p>
                  <input
                    type="email"
                    id="inputEmail"
                    class="form-control mb-2"
                    placeholder="{{ trans('admin.email') }}"
                    name="email"
                    value="{{ $email or old('email') }}"
                    required
                    autofocus=""
                  />
                  <p class="text-center mb-2">{{ trans('auth.Password') }}</p>
                  <input
                    type="password"
                    id="inputEmail"
                    class="form-control mb-2"
                    placeholder="{{ trans('auth.Password') }}"
                    name="password"
                    required
                    autofocus=""
                  />
                  <p class="text-center mb-2">{{ trans('auth.Confirm Password') }}</p>
                  <input
                    type="password"
                    id="inputEmail"
                    class="form-control mb-2"
                    placeholder="{{ trans('auth.Confirm Password') }}"
                    name="password_confirmation"
                    required
                    autofocus=""
                  />

                  <button class="btn btn-success btn-block" type="submit">
                    <i class="fas fa-sign-in-alt"></i> {{ trans('auth.Reset Password') }}
                  </button>

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
