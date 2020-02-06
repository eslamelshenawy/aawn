@extends(app('at').'.index')
{{--@section('title')
  Edit Products
@endsection--}}
@section('up')
    {{trans('admin.slider')}}
@endsection
@section('content')

	<div class="box box-info">
		<div class="box-header">

			<div class="col-md-12 col-md-offset-6">
			
			</div>
		</div>
	</div>
	<section class="content">
		<!-- widget content -->
		<div class="widget-body no-padding">
						
					{!! Form::open(['url'=>app('aurl').'/slider/'.$slider->id,'method'=>'put','id'=>'review-form','class'=>'smart-form','files'=>true]) !!}

 {{csrf_field()}}

      <div class="form-group col-sm-12">
          {!! Form::label('ar_name',trans('admin.ar_name')) !!}
          {!! Form::text('ar_name',$slider->ar_title,['class'=>'form-control']) !!}
          <p class="help-block">{{$errors->first('ar_name')}}</p>
      </div>

      <div class=" col-sm-12">

          <img src="{{url('/upload/products/'.$slider->photo)}}" style="width: 150px;height: 200px;" />

      </div>
      <div class="form-group col-sm-12">
          {!! Form::label('photo',trans('admin.photo')) !!}
          {!! Form::file('photo',['class'=>'form-control']) !!}
          <p class="help-block">{{$errors->first('photo')}}</p>
      </div>



      <div class="form-group col-sm-12">
          {!! Form::label('ar_content',trans('admin.ar_content')) !!}
          {!! Form::text('ar_content',$products->ar_content,['class'=>'form-control']) !!}
          <p class="help-block">{{$errors->first('ar_content')}}</p>
      </div>

	 
							<footer>
								<button type="submit" class="btn btn-primary" style="margin-top: 20px">
									{{trans('admin.save')}}
								</button>
							</footer>
						{!! Form::close() !!}
   

     
 
   

		<!-- end widget div -->
	</section>
	</div>


@endsection