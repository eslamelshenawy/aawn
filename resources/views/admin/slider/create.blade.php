@extends(app('at').'.index')
{{--@section('title')
   Add Products
@endsection--}}
@section('up')
    {{trans('admin.slider')}}
@endsection
@section('content')

	<section class="content">
		<!-- widget content -->
		<div class="widget-body no-padding">
						
					{!! Form::open(['url'=>app('aurl').'/slider','id'=>'review-form','class'=>'smart-form','files'=>true]) !!}



     <div class="form-group col-sm-12">
        {!! Form::label('ar_name',trans('admin.ar_name')) !!}
        {!! Form::text('ar_name',old('ar_name'),['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('ar_name')}}</p>
     </div>

        <div class="form-group col-sm-12">
        {!! Form::label('ar_content',trans('admin.ar_content')) !!}
        {!! Form::text('ar_content',old('ar_content'),['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('ar_content')}}</p>
     </div>
      <div class="form-group col-sm-12">
          {!! Form::label('image',trans('admin.image')) !!}
          {!! Form::file('image',['class'=>'form-control'],'multiple') !!}
          <p class="help-block">{{$errors->first('image')}}</p>
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