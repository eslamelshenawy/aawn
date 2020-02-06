@extends('admin.index')

@section('title')
     Product Departments
@endsection
@section('up')
    {{trans('admin.depatments')}}
@endsection
@section('content')

	<div class="box box-info">

	</div>

	<section class="content">
					<!-- widget content -->
		<div class="widget-body no-padding">

			{!! Form::open(['url'=>app('v').'/department_product','id'=>'review-form','class'=>'smart-form']) !!}


		     <div class="form-group">
        {!! Form::label('en_name',trans('admin.en_name')) !!}
        {!! Form::text('en_name',old('en_name'),['class'=>'form-control']) !!}
          <p class="help-block">{{$errors->first('en_name')}}</p>
     </div>
     <div class="form-group">
        {!! Form::label('ar_name',trans('admin.ar_name')) !!}
        {!! Form::text('ar_name',old('ar_name'),['class'=>'form-control']) !!}
      <p class="help-block">{{$errors->first('ar_name')}}</p>
     </div>

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
                                url:'{{url(app('v').'/department_product/check/parent')}}',
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
			<div class="result">

			</div>
			<p><i class="fa fa-spinner fa-spin fa-2x hidden spin_dep"></i></p>


			<footer>
				<button type="submit" class="btn btn-primary">
					{{trans('admin.add')}}
				</button>
			</footer>
			{!! Form::close() !!}

		</div>
		<!-- end widget div -->
	</section>
	</div>
	<!-- end widg
			<!-- end widget -->	
		 

@stop