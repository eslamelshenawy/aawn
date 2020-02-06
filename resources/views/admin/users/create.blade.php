@extends('admin.index')

@section('title')
    Add user
@endsection
@section('up')
    @if(isset($UserId))
        {{trans('admin.edit')}}
    @else
        {{trans('admin.daadduser')}}
    @endif
@endsection
@section('content')


    <!-- Column selectors -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            @if(isset($UserId))
               <h5> {{trans('admin.edit')}}</h5>
            @else
               <h5>{{trans('admin.daadduser')}}</h5>
            @endif
        </div>

        <form @if(isset($UserId)) action="{{aurl('users/update/'.$UserId->id)}}" @else action="{{aurl('users')}}"
              @endif method="post">

            {!! csrf_field() !!}
            <div class="panel panel-body login-form">



                <div class="form-group has-feedback has-feedback-left">
                    <input type="text" name="name"
                           @if(isset($UserId))
                           value="{{$UserId->name}}"
                           @else
                           value="{{old('name')}}"
                           @endif

                           class="form-control"
                           placeholder="user name">
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input type="email"
                           @if(isset($UserId))
                           value="{{$UserId->email}}"
                           @else
                           value=" {{old('email')}}"
                           @endif
                           name="email" class="form-control"
                           placeholder="user email">
                    <div class="form-control-feedback">
                        <i class="icon-mail5 text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>


                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.phone')}}</label>
                    <input type="number" name="phone"
                           @if(isset($UserId))
                           value="{{$UserId->phone}}"
                           @else
                           value="{{old('phone')}}"
                           @endif

                           class="form-control"
                           placeholder="{{trans('admin.phone')}}">
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.address')}}</label>

                    <input type="text" name="address"
                           @if(isset($UserId))
                           value="{{$UserId->address}}"
                           @else
                           value="{{old('address')}}"
                           @endif

                           class="form-control"
                           placeholder="{{trans('admin.address')}}">
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>
                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.location')}}</label>

                    <textarea class="form-control" rows="4"  name="location" >  @if(isset($UserId))
                            {{$UserId->location}}
                        @else
                            {{old('location')}}
                        @endif</textarea>

                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>
                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.country')}}</label>

                    <select class="form-control" id="country" name="main_country_id">
                        @if(isset($UserId))
                            <option value="{{$UserId->main_country_id}}">{{$UserId->user_main_country()->first()->country_name_ar ?? ""}}</option>
                        @else
                            <option value="">{{ trans('admin.main_country') }}</option>
                        @endif
                        @foreach ($countries as $country)
                            <option value="{{$country->id}}">
                                {{$country->country_name_ar}}
                            </option>
                        @endforeach
                    </select>
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.city')}}</label>

                    <select class="form-control" name="country_id" id="city">
                        @if(isset($UserId))
                            <option value="{{$UserId->country_id}}">   {{$UserId->user_country()->first()->country_name_ar ?? ""}}</option>
                        @else

                        @endif
                    </select>
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.company')}}</label>

                    <select class="form-control" required name="company">
                        @if(isset($UserId))
                            <option value="1" {{ $UserId->company == '1' ? 'selected' : '' }}>{{ trans('admin.company') }}</option>
                            <option value="0" {{ $UserId->company != '1' ? 'selected' : '' }}>{{ trans('admin.user') }}</option>
                        @else
                            <option value="0" {{ old('company') != '1' ? 'selected' : '' }}>{{ trans('admin.user') }}</option>
                            <option value="1" {{ old('company') == '1' ? 'selected' : '' }}>{{ trans('admin.company') }}</option>
                        @endif
                    </select>
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>







                <div class="form-group">
                    <button type="submit" class="btn bg-blue btn-block">    @if(isset($UserId))
                            {{trans('admin.save')}}

                        @else
                            {{trans('admin.add')}}

                        @endif <i
                                class="icon-arrow-right14 position-right"></i></button>
                </div>


            </div>
        </form>

    </div>
    <!-- /column selectors -->


    <script type="text/javascript">
        $('#country').change(function(){
            var cid = $(this).val();
            if(cid){
                $.ajax({
                    type:"get",
                    url:"{{ aurl('getcities/') }}/"+cid,
                    success:function(res)
                    {
                        if(res)
                        {
                            $("#city").empty();
                            $.each(res,function(key,value){
                                $("#city").append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                    }

                });
            }else{
                $("#city").empty();
            }
        });
    </script>

@endsection
