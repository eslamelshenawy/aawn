@extends('admin.index')

@section('title')
@endsection
@section('up')
    {{--{{trans('admin.addcountries')}}--}}
@endsection
@section('content')


    <!-- Column selectors -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">update About Us</h5>
            {{--<div class="heading-elements">--}}
                {{--<ul class="icons-list">--}}
                    {{--<li><a href="{{aurl('countries')}}"><span--}}
                                    {{--class="label border-left-primary label-striped">All Countries</span></a></li>--}}
                    {{--<li><a data-action="collapse"></a></li>--}}
                    {{--<li><a data-action="reload"></a></li>--}}
                    {{--<li><a data-action="close"></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>

        <form enctype="multipart/form-data" action="{{aurl('editabout')}}"method="post">

            {!! csrf_field() !!}
            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i>
                    </div>
                    <h5 class="content-group">عن عون
                    </h5>
                </div>


                <div class="form-group has-feedback has-feedback-left">
                    <textarea type="text" name="ar_content" class="form-control"   placeholder="ادخل البيانات">
                        {{$about->ar_content}}
                    </textarea>
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>



                <div class="form-group has-feedback has-feedback-left">

                    <input type="file" name="image" value="{{$about->image}}" id="img1"  onchange="readURL(this);" class="form-control" placeholder="{{trans('admin.logo')}}">
                    <img  src="{{url('public/upload/products/'.$about->image)}}" alt="your image" width="150" height="150"/>

                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn bg-blue btn-block">Update <i
                                class="icon-arrow-right14 position-right"></i></button>
                </div>

            </div>
        </form>

    </div>
    <!-- /column selectors -->

    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(input).next('img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".first").change(function () { //set up a common class
                readURL(this);
            });
        });
    </script>

@endsection
