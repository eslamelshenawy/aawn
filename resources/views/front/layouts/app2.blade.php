<!DOCTYPE html>
<html  @if (session()->get('lang') == "ar")  lang="ar" @else  lang="en" @endif >
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>عون الطبي</title>

    <!-- matterial icons  -->
    <link
      rel="stylesheet"
      href="{{ asset('front/assets/fonts/material-icons/iconfont/material-icons.css')}}"
    />

    <!-- bootstrap  -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css')}}" />
    <!-- main style  -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css')}}" />
    @if (session()->get('lang') == "ar")
    <link rel="stylesheet" href="{{ asset('front/assets/css/rtl.css')}}" />
    @else
    <link rel="stylesheet" href="{{ asset('front/assets/css/ltr.css')}}" />
    @endif
    @yield('styles')
      @stack('styles')
      <style media="screen">
      .awn-pagination .pagination{
          justify-content: center!important;
          display: flex!important;
      }
      .awn-pagination .pagination li {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        display: block;
        margin-left: -1px;
        line-height: 1.25;
        color: #007bff;
    }
        .awn-pagination .pagination li a {
          position: relative;
          text-decoration: none;

      }
        .awn-pagination .pagination li:hover a {
          color: #5a6075 !important;
      text-decoration: none;
    }

      .awn-pagination .pagination .active a {
        background-color: #5a6075;
        border-color: #5a6075;
        color: #fff !important; }

        .awn-pagination .pagination li.active {
          background-color: #5a6075;
          border-color: #5a6075;
          color: #fff !important;
      }
      .page-item.active .page-link {
          background-color: none !important;
          border-color: none !important;
          color:#FFF !important;
      }

      .page-item.active .page-link {
          background-color: #a1b7d9;
          border-color: #a1b7d9;
      }

      </style>
  </head>
  <body>


  @include('front.includes.header2')

  <!-- =============================================== -->

      @include('front.includes.messages')
                      @yield('content')

  @include('front.includes.footer')
  <!-- external scripts  -->
    <script src="{{ asset('front/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('front/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('front/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('front/assets/js/main.js')}}"></script>
    <script src="{{ asset('front/assets/plugins/owl/owl.carousel.min.js')}}"></script>
    <script>
      $(".owl-carousel-header").owlCarousel({

        loop: true,
        margin: 10,
        nav: true,
        items: 1,
        dots: true,
        autoplay: true,
        dotsEach: true
      });
      $(".owl-carousel-clients").owlCarousel({

        loop: true,
        margin: 10,
        responsiveClass: true,
        nav: true,
        dots: false,
        autoplay: true,
        responsive: {
          0: {
            items: 2
          },
          600: {
            items: 3
          },
          1000: {
            items: 5
          }
        }
      });
      $(".owl-carousel-products").owlCarousel({

        loop: false,
        margin: 10,
        responsiveClass: true,
        nav: false,
        dots: false,
        autoplay: false,
        responsive: {
          0: {
            items: 2
          },
          600: {
            items: 4
          },
          1000: {
            items: 6
          }
        }
      });
    </script>
  <!-- END PAGE LEVEL JS-->
  @yield('scripts')
	@stack('scripts')


</body>

</html>
