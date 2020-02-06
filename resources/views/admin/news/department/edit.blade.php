@extends(app('at').'.index')
{{--@section('title')
   Edit department
@endsection--}}
@section('up')
    {{trans('admin.department_news')}}
@endsection
@section('content')
	<section class="content">
					<!-- widget content -->
		<div class="widget-body no-padding">
			{!! Form::open(['url'=>app('aurl').'/department_news/'.$edit->id,'method'=>'put','id'=>'review-form','class'=>'smart-form','files'=>true]) !!}
				


					      <div class="form-group col-sm-12">
					          {!! Form::label('ar_name',trans('admin.ar_name')) !!}
					          {!! Form::text('ar_name',$edit->ar_name,['class'=>'form-control']) !!}
					          <p class="help-block">{{$errors->first('ar_name')}}</p>
					      </div>


			<footer>
				<button type="submit" class="btn btn-primary">
						{{trans('admin.save')}}
				</button>
			</footer>
			{!! Form::close() !!}

		</div>
		<!-- end widget div -->
	</section>
	</div>

@endsection