@extends('front.layouts.app2')
@section('content')
</div>
 </header>
 <!-- End header for large screens  -->
 <main>
      <section class="full-sec mt-5">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="awn-card">
                <div class="awn-card__headicon">
                  <i
                    ><img
                      src="{{ asset('front/assets/imgs/icons/heartbeat.svg')}}"
                      alt="about icon"
                  /></i>
                </div>
                <div class="awn-card__Header awn-card__Header-center">
                  <h2 class="h2">فكرة موقع عون الطبي</h2>
                </div>
                <div class="awn-card__body">
                  <div class="card-text">
                    <p>
                      نشأت فكرة الموقع قبل خمس سنوات تقريبا وتحديدا عام 1433 هـ
                      وكان الدافع منها هو تقديم خدمة مجتمعية صحية ترتكز بداية
                      علي توفير الاجهزة الطبية بطريقة سهلة وكذلك يستطيع الوصول
                      لها كافة المجتمع في المدينة والمنورة خاصة وفي المملكلة
                      بشكل عام
                    </p>
                    <p>
                      انطلق الموقع من عام 1437 هـ ولقي اهتماما بالغا من المجتمع
                      حيث كان عدد الزوار اليومي يربو علي مليون وستمائة الف زائر
                      وتم التبرع من خلاله ب الاجهزة والمستلزمات الطبية
                    </p>
                    <p>
                      كون الموقع ولله الحمد لبنة ناضجة متكاملة في الخدمة
                      والأجهزة والمستلزمات الطبيه العامة مثل الاستشارات الطبية
                      المتخصصة من قبل استشارين سعودين في التخصصات الطبية وما زال
                      التجديد والاضافة متاحة في الموقع
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!--   -->
          </div>
        </div>
      </section>

      <section class="numbers about-numbers mt-4">
        <div class="container">
          <div class="row numbers-items">
            <div class="numbers-item awn-card">
              <span class="numbers-item__icon"
                ><i class="material-icons">person</i></span
              >
              <span class="numbers-item__num" data-count="{{ userCount() }}">0</span>
              <span class="numbers-item__text">users</span>
            </div>
            <div class="numbers-item awn-card">
              <span class="numbers-item__icon"
                ><i class="material-icons">branding_watermark</i></span
              >
              <span class="numbers-item__num" data-count="{{ productCount() }}">0</span>
              <span class="numbers-item__text">Ads</span>
            </div>
            <div class="numbers-item awn-card">
              <span class="numbers-item__icon"
                ><i class="material-icons">touch_app</i></span
              >
              <span class="numbers-item__num" data-count="{{ visitorCount() }}">0</span>
              <span class="numbers-item__text">Visitors</span>
            </div>
          </div>
        </div>
      </section>

      <section class="full-sec mt-5">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="awn-card">
                <div class="awn-card__headicon awn-card__headicon-vision">
                  <i
                    ><img src="{{ asset('front/assets/imgs/icons/vision.svg')}}" alt="about icon"
                  /></i>
                </div>
                <div class="awn-card__Header awn-card__Header-center">
                  <h2 class="h2">رؤية الموقع</h2>
                </div>
                <div class="awn-card__body">
                  <ul class="card-list card-list-vision">
                    <li class="card-list-item">
                      <i class="material-icons"> done </i>
                      الوصول الي بناء مؤسسي يحقق الكفاءة والفعالية والريادة
                      التنموية الاجتماعية
                    </li>
                    <li class="card-list-item">
                      <i class="material-icons"> done </i>
                      المساهمة في تقديم الخدمة الطبية في مجال التنمية المستدامة
                      والمتطورة
                    </li>
                    <li class="card-list-item">
                      <i class="material-icons"> done </i>
                      ضمان تسهيل المساعدات الطبية لمن يحتاجها بأسهل الطرق
                      ومساعدة المرضي وخصوصا ذوي الاحتياجات الخاصة
                    </li>
                    <li class="card-list-item">
                      <i class="material-icons"> done </i>
                      توفير الراحة للمجتمع وتذليل الصعوبات لهم وخدمتهم بطريقة
                      مهنية
                    </li>
                    <li class="card-list-item">
                      <i class="material-icons"> done </i>
                      السعي لتطوير الخدمة الاجتماعية ورفع الحس التطوعي في
                      المجتمع
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!--   -->
            <div class="col-12 col-md-6">
              <div class="awn-card awn-card-goals">
                <div class="awn-card__headicon awn-card__headicon-goals">
                  <i
                    ><img src="{{ asset('front/assets/imgs/icons/goals.svg')}}" alt="about icon"
                  /></i>
                </div>
                <div class="awn-card__Header awn-card__Header-center">
                  <h2 class="h2">أهداف الموقع</h2>
                </div>
                <div class="awn-card__body">
                  <ul class="card-list card-list-goals">
                    <li class="card-list-item">
                      <i class="material-icons"> gps_fixed </i>
                      وصل المريض المحتاج بمن يمد له يد العون والمساعدة الطبية
                    </li>
                    <li class="card-list-item">
                      <i class="material-icons"> gps_fixed </i>
                      تسهيل الحصول علي الأجهزة الطبية بكافة أشكالها لمحتاجيها
                      بأيسر الطرق
                    </li>
                    <li class="card-list-item">
                      <i class="material-icons"> gps_fixed </i>
                      توفير الوقت والجهد في البحث والأستفادة من التقنية لوصول
                      المريض لحاجته دون مشقة
                    </li>
                    <li class="card-list-item">
                      <i class="material-icons"> gps_fixed </i>
                      فتح المجال للجمعيات الخيرية لعرض ما لديها من أجهزة طبية
                      وأشراكها بالتكافل الأجتماعي الخيري
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="website-mangement">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center mb-5">
              <h2 class="h3 color-text-sec">
                إدارة الموقع
              </h2>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="owl-carousel owl-theme owl-carousel-testmonials">
                <div class="item mangement-item">
                  <div class="mangement-img">
                    <img
                      src="{{ asset('front/assets/imgs/main/avatar.png')}}"
                      alt=" mangemer image"
                    />
                  </div>
                  <h2 class="h4">
                    د/ محمد بن فهد المعيقلي.
                  </h2>
                  <p>مدير الموقع</p>
                  <small>Dr.moaigly@hotmail.com </small>
                </div>
                <div class="item mangement-item">
                  <div class="mangement-img">
                    <img
                      src="{{ asset('front/assets/imgs/main/avatar.png')}}"
                      alt=" mangemer image"
                    />
                  </div>
                  <h2 class="h4">
                    د/ احمد بن حميد العوفي
                  </h2>
                  <p>مشرف الموقع</p>
                </div>
                <div class="item mangement-item">
                  <div class="mangement-img">
                    <img
                      src="{{ asset('front/assets/imgs/main/avatar.png')}}"
                      alt=" mangemer image"
                    />
                  </div>
                  <h2 class="h4">
                    أ/ منور الجهني
                  </h2>
                  <p>مشرف الموقع</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection
@section('scripts')
    <script src="{{ asset('front/assets/js/jquery.lazzy.min.js')}}"></script>
    <script src="{{ asset('front/assets/js/jquery.lazzy.picture.min.js')}}"></script>
    <script>
  $(".owl-carousel-testmonials").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    items: 1,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true
  });
</script>
@endsection
