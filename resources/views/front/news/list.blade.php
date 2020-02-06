@extends('front.layouts.app2')
@section('content')
</div>
   </header>
   <div id="msg"></div>
   <main class="event-page">

       <section class="event-sec mt-4">
         <div class="container">
           <div class="row">
             <div class="col-12">
                 <br />
                 <h3 class="text-center section-header">{{ trans('admin.events') }}</h3>
                 <br /><br />
             </div>
           </div>
           <div class="row">
               @foreach ($news as $n)
             <div class="col-12 col-md-4" style="margin-bottom:20px;">
               <div class="awn-card">
                 <div class="awn-card__header-img">
                     @if (!empty($n->news_gallary))
                         <img src="{{ asset('upload/products/'.$n->news_gallary['0']->media)}}" alt="event image" />
                     @endif
                 </div>
                 <div class="awn-card__inner-icons">
                   <div class="awn-card__inner-icons-item">
                     <i class="material-icons">
                       event_note
                     </i>
                     {{ date('Y-m-d',strtotime($n->date ?? $n->created_at)) }}
                   </div>
                   <div class="awn-card__inner-icons-item">
                     <i class="material-icons">
                       where_to_vote
                     </i>
                     {{ $n->city->country_name_ar ?? "" }} - {{ $n->country->country_name_ar ?? "" }}
                   </div>
                 </div>
                 <div class="awn-card__body ">
                   <h4 class="card-item__inner-title">
                    {{ $n->ar_title }}
                   </h4>
                 </div>
                 <div class="card-item__btns">
                   <a href="{{ url('/news/'.$n->id) }}" class="btn btn-secondary">{{ trans('admin.see more') }}</a>
                 </div>
               </div>
             </div>
         @endforeach
           </div>

                         <!--  pagination   -->
                         <br>
                         <nav class="awn-pagination mt-4 ">
                                    {{ $news->appends(request()->except('page'))->render() }}
                         </nav>
                         <!--  end pagination   -->
         </div>
       </section>

       <div class="mb-5"></div>
     </main>
@endsection
