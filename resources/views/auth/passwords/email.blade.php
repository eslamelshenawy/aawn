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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                  <form class="form-account col-12 col-md-8" method="POST" action="{{ route('password.email') }}">
                      {{ csrf_field() }}
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
                        value="{{ old('email') }}"
                        required
                        autofocus=""
                      />

                      <button class="btn btn-success btn-block" type="submit">
                        <i class="fas fa-sign-in-alt"></i> {{ trans('auth.Reset Password') }}
                      </button>

                      <hr />
                      <div class="text-center color-primary">
                        <a href="{{ url('/login') }}">{{ trans('auth.Back To Login') }}</a>
                      </div>

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
