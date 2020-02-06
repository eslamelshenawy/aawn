@extends('admin.index')

@section('up')
    {{trans('admin.daSettings')}}
@endsection


@section('content')

    <!-- Column selectors -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{trans('admin.daSettings')}}</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li class="label border-left-primary label-striped">
                        <a href="{{url('admin/setting')}}">
                           <span>

                                   {{trans('admin.daSettings')}}
                           </span>
                        </a>
                    </li>
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <form action="{{aurl('setting')}}" enctype="multipart/form-data" method="post">

            {!! csrf_field() !!}
            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-gear"></i>
                    </div>
                    <h5 class="content-group">{{trans('admin.daaddSettings')}}
                        <small class="display-block">To Your System</small>
                    </h5>
                </div>


                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.sitear')}}</label>
                    <input type="text" name="sitename_ar"
                           value="{!! sett()->sitename_ar!!}"
                           class="form-control"
                           placeholder="اسم الموقع باللغه العربيه">
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.siteen')}}</label>
                    <input type="text" name="sitename_en"

                           value="{!! sett()->sitename_en!!}"

                           class="form-control"
                           placeholder="اسم الموقع باللغه الانجليزيه">
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.siteemail')}}</label>
                    <input type="text" name="email"

                           value="{!! sett()->email!!}"

                           class="form-control"
                           placeholder="البريد الالكترونى">
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.sitelogo')}}</label>
                    <input type="file" name="logo" value="" class="form-control" placeholder="شعار الموقع">
                    {{-- @if(!empty(sett()->logo))
                         <img class="col-lg-4" src="{{Storage::url(sett()->logo)}}"/>
                     @endif--}}
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.siteicon')}}</label>
                    <input type="file" name="icon" value="" class="form-control" placeholder="ايكونه الموقع">
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.sitedescription')}}</label>
                    <input type="text" name="description"
                           value="{!! sett()->description!!}"
                           class="form-control"
                           placeholder="وصف الموقع">
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>
                {{--
                                + OptionsFull texts	id 	sitename_ar 	sitename_en 	logo 	icon 	email
                                                    status 	 	created_at 	updated_at
                --}}
                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.sitekeyword')}}</label>
                    <input type="text" name="keywords"
                           value="{!! sett()->keywords!!}"
                           class="form-control"
                           placeholder="الكلمات الدليلية">
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.sitelang')}}</label>
                    <select class="form-control" name="main_lang">
                        <option value="ar"  @if(sett()->main_lang == 'ar') selected @endif>عربى</option>
                        <option value="en"   @if(sett()->main_lang == 'en') selected @endif>English</option>
                    </select>
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.sitestatus')}}</label>
                    <select name="status" class="form-control">
                        <option disabled=""></option>

                        <option value="open" @if(sett()->status == 'open') selected @endif>open</option>
                        <option value="close"  @if(sett()->status == 'close') selected @endif>close</option>

                    </select>

                    <div class="form-control-feedback">
                        <i class="icon-mail5 text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.sitemesage')}}</label>
                    <input type="text" name="message_mentenance" value="{!! sett()->message_mentenance!!}"
                           class="form-control">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn bg-blue btn-block">{{trans('admin.save')}} <i
                                class="icon-arrow-right14 position-right"></i></button>
                </div>


            </div>
        </form>

    </div>
    <!-- /column selectors -->



@endsection