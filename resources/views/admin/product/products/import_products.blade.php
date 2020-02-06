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
						
					{!! Form::open(['url'=>app('aurl').'/products/import_products','id'=>'review-form','class'=>'smart-form','files'=>true]) !!}


      <div class="form-group col-sm-12">

          {!! Form::label('excel_file',trans('admin.excel_file')) !!}
          <p style="color: blue">{{trans('admin.excel_file')}} must be 250 * 232</p>
          {!! Form::file('excel_file',['class'=>'form-control'],'multiple') !!}
          <p class="help-block">{{$errors->first('excel_file')}}</p>
      </div>



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