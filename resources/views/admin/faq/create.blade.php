@extends(app('at').'.index')
{{--@section('title')
   Add Products
@endsection--}}
@section('up')
    {{trans('admin.faq')}}
@endsection
@section('content')

	<section class="content">
		<!-- widget content -->
		<div class="widget-body no-padding">
						
					{!! Form::open(['url'=>app('aurl').'/faq','id'=>'review-form','class'=>'smart-form','files'=>true]) !!}



     <div class="form-group col-sm-12">
        {!! Form::label('ar_question',trans('admin.ar_question')) !!}
        {!! Form::text('ar_question',old('ar_question'),['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('ar_question')}}</p>
     </div>


        <div class="form-group col-sm-12">
        {!! Form::label('ar_answer',trans('admin.ar_answer')) !!}
        {!! Form::text('ar_answer',old('ar_answer'),['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('ar_answer')}}</p>
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