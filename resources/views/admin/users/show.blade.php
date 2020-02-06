@extends('admin.index')

@section('title')

@endsection
@section('up')
    {{trans('admin.showuser')}}
@endsection
@section('content')


    <!-- Column selectors -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Show user</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a href="{{aurl('users')}}"><span
                                    class="label border-left-primary label-striped">All user</span></a></li>
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
                <div class="col-md-6 col-lg-9 content-group">
                    <span class="text-muted">اسم العميل :</span>
                    <ul class="list-condensed list-unstyled">
                        <li><h5>{{$userId->name}}</h5></li>
                        <span class="text-muted">العنوان :</span>
                        <li><span class="text-semibold"><h5>{{$userId->address}}</h5></span></li>

                                <li><h5>{{$userId->user_country()->first()->country_name_ar ?? "" }}</h5></li>

                        <span class="text-muted">البريد الاليكترونى :</span>
                        <li><a href="#"><h5>{{$userId->email}}</h5></a></li>

                    </ul>
                </div>


                    <!-- project-info -->
                    <div id="project-info" class="panel-body no-padding-bottom">
                        <div class="project-info-count col-lg-4 col-md-12">
                            <div class="project-info-icon">
                                <h2>12</h2>
                                <div class="project-info-sub-icon">
                                    <span class="la la-user"></span>
                                </div>
                            </div>
                            <div class="project-info-text pt-1">
                                <h5>طلب من عون</h5>
                            </div>
                        </div>
                        <div class="project-info-count col-lg-4 col-md-12">
                            <div class="project-info-icon">
                                <h2>16</h2>
                                <div class="project-info-sub-icon">
                                    <span class="la la-calendar-check-o"></span>
                                </div>
                            </div>
                            <div class="project-info-text pt-1">
                                <h5>منتج مفضل</h5>
                            </div>
                        </div>
                        <div class="project-info-count col-lg-4 col-md-12">
                            <div class="project-info-icon">
                                <h2>20</h2>
                                <div class="project-info-sub-icon">
                                    <span class="la la-bug"></span>
                                </div>
                            </div>
                            <div class="project-info-text pt-1">
                                <h5>منتج معروض</h5>
                            </div>
                        </div>
                    </div>
        <div class="divider"></div>
                    <!-- project-info -->
                    <div class="card-body text-center" >
<h1 class="text-center">الملف المرفق</h1>
                        <img src="{{url('/upload/'.$userId->attachment)}}" style="width: 400px" />


                    </div>
                </div>


    <!-- /column selectors -->



@endsection
