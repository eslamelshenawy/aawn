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
						
					{!! Form::open(['url'=>app('aurl').'/products','id'=>'review-form','class'=>'smart-form','files'=>true]) !!}



     <div class="form-group col-sm-12">
        {!! Form::label('ar_name',trans('admin.ar_name')) !!}
        {!! Form::text('ar_name',old('ar_name'),['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('ar_name')}}</p>
     </div>
   <div class="form-group col-sm-12">
        {!! Form::label('stock',trans('admin.stock')) !!}
        {!! Form::text('stock',old('stock'),['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('stock')}}</p>
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
        {!! Form::label('price',trans('admin.price')) !!}
        {!! Form::text('price',old('price'),['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('price')}}</p>
     </div>





      <div class="form-group col-sm-12">
          {!! Form::label('ar_content',trans('admin.content')) !!}
          {!! Form::text('ar_content',old('ar_content'),['class'=>'form-control']) !!}
          <p class="help-block">{{$errors->first('ar_content')}}</p>
      </div>
<div class="form-group col-sm-12">

			@if(count($department) > 0)
				<script type="text/javascript">
                    $(document).on('change','.checkparent',function(){
                        var parent = $('option:selected',this).val();
                        var master = $('option:selected',this).attr('master');

                        if(parent == '' || parent == null || master == 'master')
                        {
                            $('.result').empty();
                        }else{

                            $.ajax({
                                url:'{{url(app('aurl').'/department_product/check/parent')}}',
                                type:'post',
                                dataType:'json',
                                data:{parent:parent,'_token':'{!! csrf_token() !!}'},
                                beforeSend: function()
                                {
                                    $('.spin_dep').removeClass('hidden');
                                },success: function(data)
                                {
                                    if(data != 'false')
                                    {
                                        $('.result').append(data);
                                    }
                                    $('.spin_dep').addClass('hidden');
                                },error: function()
                                {
                                    $('.spin_dep').addClass('hidden');
                                }
                            });
                        }

                    });
				</script>
				<fieldset>
					<label>{{trans('admin.sub_to')}}</label>
					{!! Form::select('parent',$department,old('parent'),['class'=>'form-control checkparent','placeholder'=>trans('admin.master_department')]) !!}
				</fieldset>
			@endif
		</div>
			<div class="result">

			</div>
			<p><i class="fa fa-spinner fa-spin fa-2x hidden spin_dep"></i></p>

				<footer>
								<button type="submit" class="btn btn-primary" style="margin-top: 20px">
									{{trans('admin.add')}}
								</button>
							</footer>
						{!! Form::close() !!}
		</div>
		<!-- end widget div -->
	</section>
	</div>
			<!-- end widget -->	
	

@endsection