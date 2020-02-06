@extends('admin.index')

@section('title')

@endsection
@section('up')
    @if(isset($countryId))
        {{trans('admin.edit')}}      @else
        {{trans('admin.addcountries')}}       @endif
@endsection
@section('content')


    <!-- Column selectors -->
    <div class="panel panel-flat">
        <div class="panel-heading">

            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a href="{{aurl('countries')}}"><span
                                    class="label border-left-primary label-striped">    {{trans('admin.countries')}}
</span></a></li>
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <form enctype="multipart/form-data" @if(isset($countryId)) action="{{aurl('countries/update/'.$countryId->id)}}"
              @else action="{{aurl('countries')}}"
              @endif method="post">

            {!! csrf_field() !!}
            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i>
                    </div>
                    <h5 class="content-group">  @if(isset($countryId))
                            {{trans('admin.edit')}}      @else
                            {{trans('admin.addcountries')}}       @endif
                    </h5>
                </div>


                <div class="form-group has-feedback has-feedback-left">
                    <input type="text" name="country_name_ar"
                           @if(isset($countryId))
                           value="{{$countryId->country_name_ar}}"
                           @else
                           value="{{old('country_name_ar')}}"
                           @endif

                           class="form-control"
                           placeholder="{{trans('admin.country_name_ar')}}">
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>






                <div class="form-group has-feedback has-feedback-left">
                    <input type="text" name="code"
                           @if(isset($countryId))
                           value="{{$countryId->code}}"
                           @else
                           value="{{old('code')}}"
                           @endif

                           class="form-control"
                           placeholder="{{trans('admin.country_code')}}">
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>



                <div class="form-group has-feedback has-feedback-left">
                    <select name="parent" class="form-control">
                        <option value="">{{trans('admin.main_country')}}</option>
                        @foreach($countryAll as $allcountry)
                            <option value="{{$allcountry->id}}">{{$allcountry->country_name_ar}}</option>
                        @endforeach
                    </select>
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn bg-blue btn-block">  @if(isset($countryId))
                            {{trans('admin.edit')}}      @else
                            {{trans('admin.addcountries')}}       @endif <i
                                class="icon-arrow-right14 position-right"></i></button>
                </div>

            </div>
        </form>

    </div>
    <!-- /column selectors -->



@endsection