<footer class="main-footer">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-4 main-footer__logo">
            <div class="brand">
              <img
                class="lazzy"
                src="{{ asset('front/assets/imgs/main/logo-black.png')}}"
                alt="Awn logo"
              />
            </div>

            @if (session()->get('lang') == "ar")
                <p class="text">
                 أُنشيء هذا الموقع، لخدمتكم في توفير ما تحتاجونه من الأجهزة الطبية، والتبرع بالدم، وكذلك خدمة المتبرع بالجهاز ليكفيه عناء البحث عن صاحب الحاجة على مستوى المملكة العربية السعودية والخليج العربي.
                </p>
            @else
                <p>This site was created to serve you in providing you with the medical devices you need, donating blood, and the service of the device's donor to suffice to search for the owner of the need at the level of the Kingdom of Saudi Arabia and the Arab Gulf.</p>
            @endif
          </div>
          <div class="col-12 col-md-4 main-footer__contact">
            <h3>{{ trans('admin.contact') }}</h3>
            <ul>
              @if (session()->get('lang') == "ar")
                  <li>المملكة العربية السعودية - الرياض</li>
              @else
                  <li>Saudi Arabia Kindom, Riadah</li>
              @endif
              <li>{{ trans('admin.phone') }}: 300 323 3456</li>
              <li>{{ trans('admin.fax') }}: 300 323 1456</li>
              <li>{{ trans('admin.mobile') }}: 0599539396</li>
              <li>
                <a href="mailto:Dr.moaigly@hotmail.com"
                  >Dr.moaigly@hotmail.com</a
                >
              </li>
            </ul>
          </div>
          <div class="col-12 col-md-4 main-footer__nums numbers">
            <h3>{{ trans('admin.statistics') }}</h3>
            <div class="row numbers-items">
              <div class="numbers-item">

                <span class="numbers-item__icon"
                  ><i class="material-icons">person</i></span
                >
                <span class="numbers-item__num" data-count="{{ userCount() }}">0</span>
                <span class="numbers-item__text">{{ trans('admin.members') }}</span>
              </div>
              <div class="numbers-item">
                <span class="numbers-item__icon"
                  ><i class="material-icons">branding_watermark</i></span
                >
                <span class="numbers-item__num" data-count="{{ productCount() }}">0</span>
                <span class="numbers-item__text">{{ trans('admin.Ads') }}</span>
              </div>
              <div class="numbers-item">
                <span class="numbers-item__icon"
                  ><i class="material-icons">touch_app</i></span
                >
                <span class="numbers-item__num" data-count="{{ visitorCount() }}">0</span>
                <span class="numbers-item__text">{{ trans('admin.visitors') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-base">
        <div class="container">
          <div class="row">
            <div class="footer-base__copy col-12 col-lg-6">
              @if (session()->get('lang') == "ar")
                  جميع الحقوق محفوظة © لموقع عون الطبي
              @else
                  All copyrights © reserved to AwnBank
              @endif
            </div>
            <div class="footer-base__social col-12 col-lg-6">
              <ul class="social-links">
                <li class="social-links__link">
                  <a href="#"
                    ><img
                      src="{{ asset('front/assets/imgs/icons/facebook.svg')}}"
                      alt="social link"
                  /></a>
                </li>
                <li class="social-links__link">
                  <a href="#"
                    ><img
                      src="{{ asset('front/assets/imgs/icons/twitter.svg')}}"
                      alt="social link"
                  /></a>
                </li>
                <li class="social-links__link">
                  <a href="#"
                    ><img
                      src="{{ asset('front/assets/imgs/icons/snapchat.svg')}}"
                      alt="social link"
                  /></a>
                </li>
                <li class="social-links__link">
                  <a href="#"
                    ><img
                      src="{{ asset('front/assets/imgs/icons/linkedin.svg')}}"
                      alt="social link"
                  /></a>
                </li>
                <li class="social-links__link">
                  <a href="#"
                    ><img
                      src="{{ asset('front/assets/imgs/icons/instgram.svg')}}"
                      alt="social link"
                  /></a>
                </li>
                <li class="social-links__link">
                  <a href="#"
                    ><img
                      class="lazzy"
                      src="{{ asset('front/assets/imgs/icons/youtube.svg')}}"
                      alt="social link"
                  /></a>
                </li>
                <li class="social-links__link">
                  <a href="#"
                    ><img
                      class="lazzy"
                      src="{{ asset('front/assets/imgs/icons/whatsapp.svg')}}"
                      alt="social link"
                  /></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  </footer>
