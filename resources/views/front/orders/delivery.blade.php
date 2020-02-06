@extends('front.layouts.app2')
@section('content')
</div>
   </header>

   <div id="msg"></div>

     <main class="mt-4">
       <section class="title-sec">
         <div class="container">
           <div class="row">
             <div class="col-12">
               <h1 class="h2 sec-title">
                 {{ trans('admin.shipp_request') }}
               </h1>
             </div>
           </div>
         </div>
       </section>

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
                     <a href="#"> <span> {{ trans('admin.shipp_request') }} </span> </a>
                   </li>
                 </ol>
               </nav>
             </div>
           </div>
         </div>
       </section>

       <section class="layout-sec mt-5">
         <div class="container">
           <div class="row form-group">
             <div class="col-12 awn-card awn-steps py-4 px-5">
               <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                 <!-- for active status add class "active"
                 and delete class "disabled" -->

                 <li @if($level == "prepare") class="nav-item awn-step  active" @else class="nav-item awn-step  disabled" @endif>
                   <a href="#step-1" class="nav-link">
                     <div class="step-img">
                       <img
                         class="static-img"
                         src="{{ asset('front/assets/imgs/gifs/box.png')}}"
                         alt="icon"
                       />
                       <img
                         class="active-img"
                         src="{{ asset('front/assets/imgs/gifs/box.gif')}}"
                         alt="icon"
                       />
                     </div>
                     <span class="step-circle"></span>
                   </a>
                   <p class="list-group-item-text">{{ trans('admin.prepare') }}</p>
                 </li>

                 <hr />

                 <li @if($level == "ship") class="nav-item awn-step  active" @else class="nav-item awn-step  disabled" @endif>
                   <a href="#step-2" class="nav-link">
                     <div class="step-img">
                       <img
                         class="static-img"
                         src="{{ asset('front/assets/imgs/gifs/shipped.png')}}"
                         alt="icon"
                       />
                       <img
                         class="active-img"
                         src="{{ asset('front/assets/imgs/gifs/shipped.gif')}}"
                         alt="icon"
                       />
                     </div>
                     <span class="step-circle"></span>
                   </a>
                   <p class="list-group-item-text">{{ trans('admin.ship') }}</p>
                 </li>

                 <hr />

                 <li @if($level == "done") class="nav-item awn-step  active" @else class="nav-item awn-step  disabled" @endif>
                   <a href="#step-3" class="nav-link">
                     <div class="step-img">
                       <img
                         class="static-img"
                         src="{{ asset('front/assets/imgs/gifs/checkmark-ok.png')}}"
                         alt="icon"
                       />
                       <img
                         class="active-img"
                         src="{{ asset('front/assets/imgs/gifs/checkmark-ok.gif')}}"
                         alt="icon"
                       />
                     </div>
                     <span class="step-circle"> </span>
                   </a>
                   <p class="list-group-item-text">{{ trans('admin.done') }}</p>
                 </li>

                 <hr />

                 <li @if($level == "reject") class="nav-item awn-step  active" @else class="nav-item awn-step  disabled" @endif>
                   <a href="#step-4" class="nav-link">
                     <div class="step-img">
                       <img
                         class="static-img"
                         src="{{ asset('front/assets/imgs/gifs/mailbox.png')}}"
                         alt="icon"
                       />
                       <img
                         class="active-img"
                         src="{{ asset('front/assets/imgs/gifs/mailbox.gif')}}"
                         alt="icon"
                       />
                     </div>
                     <span class="step-circle"> </span>
                   </a>
                   <p class="list-group-item-text">{{ trans('admin.reject') }}</p>
                 </li>
               </ul>
             </div>
           </div>
           <div
             class="row setup-content main-step awn-card p-3 py-5"
             id="step-1"
           >
             <div class="col-xs-12" style="margin:auto;">
               <div class="col-md-12 well text-center">
                 <i class="main-step-icon">
                   <img src="{{ asset('front/assets/imgs/icons/delivery-1.svg')}}" alt="icon" />
                 </i>
                 <h2 class="main-step-header">{{ trans('admin.prepare') }}</h2>
               </div>
             </div>
           </div>
           <div class="row setup-content awn-card awn-card p-3 py-5" id="step-2">
             <div class="col-xs-12" style="margin:auto;">
               <div class="col-md-12 well text-center">
                 <i class="main-step-icon">
                   <img src="{{ asset('front/assets/imgs/icons/delivery-2.svg')}}" alt="icon" />
                 </i>
                 <h2 class="main-step-header">{{ trans('admin.ship') }}</h2>
               </div>
             </div>
           </div>
           <div class="row setup-content awn-card awn-card p-3 py-5" id="step-3">
             <div class="col-xs-12" style="margin:auto;">
               <div class="col-md-12 well text-center">
                 <i class="main-step-icon">
                   <img src="{{ asset('front/assets/imgs/icons/delivery-3.svg')}}" alt="icon" />
                 </i>
                 <h2 class="main-step-header">{{ trans('admin.done') }}</h2>
               </div>
             </div>
           </div>

           <div class="row setup-content awn-card awn-card p-3 py-5" id="step-4">
             <div class="col-xs-12" style="margin:auto;">
               <div class="col-md-12 well text-center">
                 <i class="main-step-icon">
                   <img src="{{ asset('front/assets/imgs/icons/delivery-3.svg')}}" alt="icon" />
                 </i>
                 <h2 class="main-step-header">{{ trans('admin.reject') }}</h2>
               </div>
             </div>
           </div>

         </div>
       </section>

       <div class="mb-5"></div>
     </main>
@endsection
@section('scripts')
    <script>
     $(function() {
       // active class
       $(".awn-card-filter-type .nav-item").on("click", function(e) {
         e.preventDefault();
         $(".awn-card-filter-type .nav-item").removeClass("active");
         $(this).addClass("active");
       });
       $(".awn-card-filter-tags .nav-item").on("click", function(e) {
         e.preventDefault();
         $(".awn-card-filter-tags .nav-item").removeClass("active");
         $(this).addClass("active");
       });
       // filter
       $(".awn-card-filter-type .nav-item-all").on("click", function() {
         $(".single-product").removeClass("d-none", 1000);
       });
       $(".awn-card-filter-type .nav-item-offers").on("click", function() {
         $(".single-product").removeClass("d-none", 1000);
         $(".single-product-need").addClass("d-none", 1000);
       });
       $(".awn-card-filter-type .nav-item-needs").on("click", function() {
         $(".single-product").removeClass("d-none", 1000);
         $(".single-product-offer").addClass("d-none", 1000);
       });

       ///////////////////////////////
       // steps script
       var navListItems = $("ul.setup-panel li a"),
         allWells = $(".setup-content");

       allWells.hide();

       navListItems.click(function(e) {
         e.preventDefault();
         var $target = $($(this).attr("href")),
           $item = $(this).closest("li");

         if (!$item.hasClass("disabled")) {
           navListItems.closest("li").removeClass("active");
           $item.addClass("active");
           allWells.hide();
           $target.show();
         }
       });

       $("ul.setup-panel li.active a").trigger("click");

       // DEMO ONLY //
       $("#activate-step-2").on("click", function(e) {
         $("ul.setup-panel li:eq(1)").removeClass("disabled");
         $('ul.setup-panel li a[href="#step-2"]').trigger("click");
         $(this).remove();
       });

       $("#activate-step-3").on("click", function(e) {
         $("ul.setup-panel li:eq(2)").removeClass("disabled");
         $('ul.setup-panel li a[href="#step-3"]').trigger("click");
         $(this).remove();
       });

       $("#activate-step-4").on("click", function(e) {
         $("ul.setup-panel li:eq(3)").removeClass("disabled");
         $('ul.setup-panel li a[href="#step-4"]').trigger("click");
         $(this).remove();
       });
     });
   </script>
@endsection
