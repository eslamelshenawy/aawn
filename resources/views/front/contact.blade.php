@extends('front.layouts.app2')
@section('content')
</div>
 </header>
 <!-- End header for large screens  -->
 <main class="contact-page mb-5">
    <section class="full-sec mt-5">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-7">
            <div class="awn-card">
              <div class="awn-card__headicon awn-card__headicon-vision">
                <i
                  ><img src="{{ asset('front/assets/imgs/icons/contact.svg')}}" alt="about icon"
                /></i>
              </div>
              <div class="awn-card__Header awn-card__Header-center">
                <h2 class="h2">{{ trans('admin.contact') }}</h2>
              </div>
              <div class="awn-card__body p-5 mb-2">
                <form class="" method="post" action="{{ url('/send') }}">
                    {!! csrf_field() !!}
                    <div class="form-group mb-4">
                      <label class="bold">{{ trans('admin.name') }}</label>
                      <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="{{ trans('admin.name') }}">
                    </div>
                  <div class="form-group mb-4">
                    <label class="bold">{{ trans('admin.title_message') }}</label>
                    <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" placeholder="{{ trans('admin.title_message') }}">
                  </div>
                  <div class="form-group mb-4">
                    <label class="bold">{{ trans('admin.way_message') }}</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="{{ trans('admin.mail_mobile') }}">
                  </div>
                  <div class="form-group mb-4">
                    <label class="bold">{{ trans('admin.content_message') }}</label>
                    <textarea class="form-control" name="message"  rows="3">{{ old('message') }}</textarea>
                  </div>
                  <button type="submit" class="btn btn-primary px-4">{{ trans('admin.send') }}</button>
                  <button type="reset" class="btn btn-light px-4 mx-2">{{ trans('admin.cancel') }}</button>
                </form>
              </div>
            </div>
          </div>
          <!--   -->
          <div class="col-12 col-md-5">
            <div class="awn-card awn-card-goals">
              <div class="awn-card__headicon awn-card__headicon-goals">
                <i
                  ><img src="{{ asset('front/assets/imgs/icons/telephone.svg')}}" alt="about icon"
                /></i>
              </div>
              <div class="awn-card__Header awn-card__Header-center">
                <h2 class="h2">{{ trans('admin.contact_details') }}</h2>
              </div>
              <div class="awn-card__body ">
                <ul class="card-list card-list-goals">
                  <li class="card-list-item">
                    <i class="material-icons"> home </i>
                    <strong> {{ trans('admin.address') }} : &nbsp </strong> المملكة العربية السعودية, الرياض
                    شارع الملك
                  </li>
                  <li class="card-list-item">
                    <i class="material-icons"> local_phone </i>
                    0599539396
                  </li>
                  <li class="card-list-item">
                    <i class="material-icons"> email</i>
                    info@aawnn.net
                  </li>
                  <li class="card-list-item">
                    <i class="material-icons"> email</i>
                    support@aawnn.net
                  </li>
                </ul>
                <div class="col-12 contact-social mb-4">
                  <ul class="social-links">
                    <li class="social-links__link">
                      <a href="#"><img src="{{ asset('front/assets/imgs/icons/facebook.svg')}}" alt="social link"></a>
                    </li>
                    <li class="social-links__link">
                      <a href="#"><img src="{{ asset('front/assets/imgs/icons/twitter.svg')}}" alt="social link"></a>
                    </li>
                    <li class="social-links__link">
                      <a href="#"><img src="{{ asset('front/assets/imgs/icons/snapchat.svg')}}" alt="social link"></a>
                    </li>
                    <li class="social-links__link">
                      <a href="#"><img src="{{ asset('front/assets/imgs/icons/linkedin.svg')}}" alt="social link"></a>
                    </li>
                    <li class="social-links__link">
                      <a href="#"><img src="{{ asset('front/assets/imgs/icons/instgram.svg')}}" alt="social link"></a>
                    </li>
                    <li class="social-links__link">
                      <a href="#"><img class="lazzy" src="{{ asset('front/assets/imgs/icons/youtube.svg')}}" alt="social link"></a>
                    </li>
                    <li class="social-links__link">
                      <a href="#"><img class="lazzy" src="{{ asset('front/assets/imgs/icons/whatsapp.svg')}}" alt="social link"></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
@endsection
