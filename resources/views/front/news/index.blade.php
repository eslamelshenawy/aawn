@extends('front.layouts.app2')
@section('content')
</div>
   </header>
   <div id="msg"></div>
   <main class="event-page">

       <section class="full-sec mt-5">
         <div class="container">
           <div class="row">
             <div class="col-12">
               <h1 class="h3 py-3 mb-4 event-title">
                     {{ $news->ar_title }}
               </h1>
             </div>
             <!-- main slider  -->
             <div class="col-12 event-slider">
               <div class="owl-carousel owl-carousel-event slider-items">
                   @foreach ($news->news_gallary as $gallery)
                       <div class="slider-item">
                           <img src="{{ asset('upload/products/'.$gallery->media) }}" alt="events" />
                       </div>
                   @endforeach

               </div>
             </div>
             <!--   -->
           </div>
           <div class="row">
             <!-- side bar  -->
             <div class="col-12 col-md-4 order-md-10 event-side-bar">
               <!-- event time  -->
               <div class="awn-card mb-3">
                 <div class="awn-card__Header ">
                   <h4 class="h5 pt-2 awn-card__Header-title">
                     <i class="material-icons">
                       event_note
                     </i>
                      {{ date('Y-m-d',strtotime($news->date ?? $news->created_at)) }}
                   </h4>
                 </div>
                 <div class="awn-card__body p-0 side-map"></div>
               </div>
               <!-- event location  -->
               <div class="awn-card mb-3">
                 <div class="awn-card__Header ">
                   <h4 class="h5 pt-2 awn-card__Header-title">
                     <i class="material-icons">
                       where_to_vote
                     </i>
                     {{ $news->country->country_name_ar ?? "" }} - {{ $news->city->country_name_ar ?? "" }}
                   </h4>

                 </div>
                 <br />
                 <p style="padding:15px;">{{ $news->address }}</p>
                 <br />
               </div>
             </div>
             <!-- content  -->
             <div class="col-12 col-md-8 order-md-1">
               <!-- main content  -->
               <div class="awn-card mb-4 o-hidden">


                 <div class="awn-card__body">
                   <div class="card-text event-card-text">
                     <p>{{ $news->ar_content }}</p>
                   </div>
                 </div>
               </div>
               @if (count($news->comment) > '0')
                   <!-- comments content  -->
                   <div class="awn-card awn-card-comments mb-4">
                     <div class="awn-card__Header d-block ">
                       <h4 class="h5 pt-3">
                         {{ trans('admin.comments') }}
                       </h4>
                     </div>

                     <div class="awn-card__body comments__list">
                       <ul class="comments__list-items">
                           @foreach ($news->comment as $comment)
                               <li class="comments__list-item">
                                   <div class="user">
                                       <span class="user-img">
                                           <img
                                           src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png"
                                           alt="user name img"
                                           />
                                       </span>
                                   </div>
                                   <div class="comment-box">
                                       <div class="user-name ">
                                           <span class="user-text text-dark">{{ $comment->user->name ?? "" }}</span>
                                           <span class="comment-time ">
                                               ( {{ date('Y-m-d H:i',strtotime($comment->created_at)) }}  )
                                           </span>
                                       </div>

                                       <div class="user-comment">
                                          {{ $comment->comment }}
                                       </div>
                                   </div>
                               </li>
                           @endforeach

                       </ul>
                     </div>
                   </div>
                   <!-- comments content  -->
               @else
                   <!-- comments content  -->
                   <div class="awn-card awn-card-comments mb-4">
                     <div class="awn-card__Header d-block ">
                       <h4 class="h5 pt-3">
                         {{ trans('admin.comments') }}
                       </h4>
                     </div>

                     <div class="awn-card__body comments__list">
                       <h3>{{ trans('admin.no_comments') }}</h3>
                     </div>
                   </div>
                   <!-- comments content  -->
               @endif

               @if (auth()->check())
                   <div class="awn-card awn-card-comments mb-4">
                       <div class="awn-card__Header d-block ">
                           <h4 class="h5 pt-3">
                               {{ trans('admin.make_comment') }}
                           </h4>
                       </div>
                       <div class="awn-card__body ">
                           <form class="theme-form" method="post" action="{{ url('/news/store') }}">
                               {!! csrf_field() !!}
                               <div class="form-row">
                                   <div class="col-md-12 mb-2">
                                       <input
                                       type="hidden"
                                       value="{{ $news->id }}"
                                       class="form-control"
                                       name="news_id"
                                       id="name"
                                       />
                                   </div>

                                   <div class="col-md-12 mb-3">
                                       <textarea
                                       class="form-control"
                                       placeholder="{{ trans('admin.comment') }}"
                                       id="exampleFormControlTextarea1"
                                       rows="6"
                                       required
                                       name="comment"
                                       >{{ old('comment') }}</textarea>
                                   </div>
                                   <div class="col-md-12">
                                       <button class="btn btn-primary" type="submit">
                                           {{ trans('admin.send_comment') }}
                                       </button>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               @endif
               <!-- end of comments cards  -->
             </div>
           </div>
         </div>
       </section>

       <div class="mb-5"></div>
     </main>
    <input type="hidden" value="{{ csrf_token() }}" id="csrf_token" />

@endsection
@section('scripts')
    <script src="./assets/plugins/owl/owl.carousel.min.js"></script>
        <script>
          $(".owl-carousel-event").owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            stagePadding: 40,
            items: 1,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true
          });
        </script>
@endsection
