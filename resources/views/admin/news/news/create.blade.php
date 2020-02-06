@extends(app('at').'.index')
{{--@section('title')
   Add Products
@endsection--}}
@section('up')
    {{trans('admin.products')}}
@endsection
@section('content')

	<section class="content">
		<!-- widget content -->
		<div class="widget-body no-padding">
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('news'),'files'=>true,'enctype' =>'multipart/form-data']) !!}
      {!! csrf_field() !!}



     <div class="form-group col-sm-12">
        {!! Form::label('ar_name',trans('admin.ar_name')) !!}
        {!! Form::text('ar_name',old('ar_name'),['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('ar_name')}}</p>
     </div>

     <div class="form-group col-sm-12">
        {!! Form::label('date',trans('admin.date')) !!}
        {!! Form::date('date',old('date'),['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('date')}}</p>
     </div>




     <!--   -->
     <div class="form-group col-12 col-md-6">
       <label for="exampleFormControlSelect1">{{ trans('admin.country') }}</label>
       <select class="form-control" name="main_country_id" required id="country">
           <option value="">{{ trans('admin.country') }}</option>
           @foreach ($countries as $country)
               <option value="{{$country->id}}" {{ $country->id == old('main_country_id') ? 'selected' : '' }}>
                   {{$country->country_name_ar}}
               </option>
           @endforeach
       </select>
     </div>
     <!--   -->
     <div class="form-group col-12 col-md-6">
       <label for="exampleFormControlSelect1">{{ trans('admin.city') }}</label>
       <select class="form-control" required name="country_id" id="city">
       </select>
     </div>
     <!--   -->

     <div class="form-group col-sm-12">
        {!! Form::label('address',trans('address')) !!}
        {!! Form::text('address',old('address'),['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('address')}}</p>
     </div>


      <div class="imageUpload col-sm-12 form-group">
          <div class="col-sm-1 pull-right" style="margin-top: 50px">
              <a class="btn btn-info btn-rounded  addInput">Add</a>
          </div>
          <div class="inputDiv">
              <div class="col-sm-10">
                  {!! Form::label('media',trans('admin.media')) !!}
                  <p style="color: blue">{{trans('admin.media')}} must be 180 * 180</p>
                  {!! Form::file('media[]',['class'=>'form-control']) !!}

              </div>
              <div class="col-sm-1 pull-right" style="margin-top: 50px">
                  <a class="btn btn-danger btn-rounded removeInput">Remove</a>
              </div>
          </div>
      </div>




      <div class="form-group col-sm-12">
          {!! Form::label('ar_content',trans('admin.ar_content')) !!}
          {!! Form::text('ar_content',old('ar_content'),['class'=>'form-control']) !!}
          <p class="help-block">{{$errors->first('ar_content')}}</p>
      </div>



      <div class="form-group col-sm-12">
     {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
          </div>

    {!! Form::close() !!}

 		</div>
		<!-- end widget div -->
	</section>
	</div>
			<!-- end widget -->


            <input type="hidden" value="{{ csrf_token() }}" id="csrf_token" />
             <script type="text/javascript">
             $('#country').change(function(){
                var cid = $(this).val();
                if(cid){
                $.ajax({
                   type:"get",
                   url:"{{ url('getcities/') }}/"+cid,
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
