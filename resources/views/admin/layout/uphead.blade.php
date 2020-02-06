<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">@yield('up')</span>
                </h4>
            </div>

            <div class="heading-elements">
              
            </div>
        </div>
 <!-- breadcrumb -->
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
              
                 <li><a href="{{ aurl('') }}"><i class="icon-home2 position-left"></i> {{trans('admin.dashboard')}} </a></li>
          <?php
          $path_segment = 10;
          $sublink = '';
          ?>
        @for($i=2;$i < $path_segment; $i++)
          @if(!empty(Request::segment($i)) and !is_numeric(Request::segment($i)))

            @if($i != 2)
                      <?php $sublink .= '/'; ?>
            @endif

                  <?php $sublink .= Request::segment($i); ?>
            <li> <a href="{{aurl( ).'/'.$sublink}}">{{trans('admin.'.Request::segment($i))}}</a></li>
          @endif
        @endfor
        @if(!empty($master))
          <li>   {!! $master !!}</li>
        @endif
            </ul>
        </div>
              <!-- end breadcrumb -->
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

    
