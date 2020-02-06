@extends('admin.index')

@section('title')
    Add Admin
@endsection

@section('up')
    {{trans('admin.daaddadmin')}}
@endsection
@section('content')


    <!-- Column selectors -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{trans('admin.daaddadmin')}}</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a href="{{aurl('admins')}}"><span
                                    class="label border-left-primary label-striped">{{trans('admin.daaddadmin')}}</span></a>
                    </li>
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <form @if(isset($adminId)) action="{{aurl('admins/update/'.$adminId->id)}}" @else action="{{aurl('admins')}}"
              @endif method="post">

            {!! csrf_field() !!}
            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i>
                    </div>
                    <h5 class="content-group">{{trans('admin.newadmin')}}
                        <small class="display-block">To Your System</small>
                    </h5>
                </div>


                <div class="form-group has-feedback has-feedback-left">
                    <input type="text" name="name"
                           @if(isset($adminId))
                           value="{{$adminId->name}}"
                           @else
                           value="{{old('name')}}"
                           @endif

                           class="form-control"
                           placeholder="{{trans('admin.namelogin')}}">
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input type="email"
                           @if(isset($adminId))
                           value="{{$adminId->email}}"
                           @else
                           value=" {{old('email')}}"
                           @endif


                           name="email" class="form-control"
                           placeholder="{{trans('admin.emaillogin')}}">
                    <div class="form-control-feedback">
                        <i class="icon-mail5 text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input type="password" name="password" class="form-control" placeholder="{{trans('admin.passlogin')}}">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn bg-blue btn-block">Login <i
                                class="icon-arrow-right14 position-right"></i></button>
                </div>


            </div>
        </form>

    </div>
    <!-- /column selectors -->



@endsection