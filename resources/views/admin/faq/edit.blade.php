@extends(app('at').'.index')
{{--@section('title')
  Edit Products
@endsection--}}
@section('up')
    {{trans('admin.faq')}}
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
						
					{!! Form::open(['url'=>app('aurl').'/faq/'.$faq->id,'method'=>'put','id'=>'review-form','class'=>'smart-form','files'=>true]) !!}

 {{csrf_field()}}

      <div class="form-group col-sm-12">
          {!! Form::label('ar_question',trans('admin.ar_question')) !!}
          {!! Form::text('ar_question',$faq->ar_question,['class'=>'form-control']) !!}
          <p class="help-block">{{$errors->first('ar_question')}}</p>
      </div>

  



      <div class="form-group col-sm-12">
          {!! Form::label('ar_answer',trans('admin.ar_answer')) !!}
          {!! Form::text('ar_answer',$faq->ar_answer,['class'=>'form-control']) !!}
          <p class="help-block">{{$errors->first('ar_answer')}}</p>
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