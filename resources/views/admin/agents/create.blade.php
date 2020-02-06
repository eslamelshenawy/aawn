@extends('admin.index')

@section('title')
    Add Agent
@endsection
@section('up')
    @if(isset($AgentId))
        {{trans('admin.edit')}}

    @else
        {{trans('admin.addagent')}}

    @endif
@endsection
@section('content')


    <!-- Column selectors -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">    @if(isset($AgentId))
                    {{trans('admin.edit')}}

                @else
                    {{trans('admin.addagent')}}

                @endif</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a href="{{aurl('agents')}}"><span
                                    class="label border-left-primary label-striped">        {{trans('admin.allagent')}}
</span></a></li>
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <form @if(isset($AgentId)) action="{{aurl('agents/update/'.$AgentId->id)}}" @else action="{{aurl('agents/store/')}}"
              @endif method="post">

            {!! csrf_field() !!}
            <div class="panel panel-body login-form">


                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.name')}}</label>

                    <input type="text" name="name"
                           @if(isset($AgentId))
                           value="{{$AgentId->name}}"
                           @else
                           value="{{old('name')}}"
                           @endif

                           class="form-control"
                           placeholder="{{trans('admin.name')}}">
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.email')}}</label>

                    <input type="email"
                           @if(isset($AgentId))
                           value="{{$AgentId->email}}"
                           @else
                           value=" {{old('email')}}"
                           @endif


                           name="email" class="form-control"
                           placeholder="{{trans('admin.email')}}">
                    <div class="form-control-feedback">
                        <i class="icon-mail5 text-muted"></i>
                    </div>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <label>{{trans('admin.phone')}}</label>
                    <input type="number" name="phone"
                           @if(isset($AgentId))
                           value="{{$AgentId->phone}}"
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
                           @if(isset($AgentId))
                           value="{{$AgentId->address}}"
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

                    <textarea class="form-control" rows="4"  name="location" >  @if(isset($AgentId))
                           {{$AgentId->location}}
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
                        @if(isset($AgentId))
                            <option value="{{$AgentId->main_country_id}}">{{$AgentId->agent_main_country()->first()->country_name_ar ?? ""}}</option>
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
                        @if(isset($AgentId))
                        <option value="{{$AgentId->country_id}}">   {{$AgentId->agent_country()->first()->country_name_ar ?? ""}}</option>
                        @else

                        @endif
                    </select>
                    <div class="form-control-feedback">
                        <i class="icon-indent-decrease text-muted"></i>
                    </div>
                </div>







                <div class="form-group">
                    <button type="submit" class="btn bg-blue btn-block">    @if(isset($AgentId))
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
