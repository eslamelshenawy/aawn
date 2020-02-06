@extends(app('at').'.index')
{{--@section('title')
  Edit Products
@endsection--}}
@section('up')
    {{trans('admin.news')}}
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
    {!! Form::open(['url'=>aurl('news/'.$posts->id),'method'=>'put','files'=>true,'enctype' =>'multipart/form-data' ]) !!}


      <div class="form-group col-sm-12">
          {!! Form::label('ar_name',trans('admin.ar_name')) !!}
          {!! Form::text('ar_name',$posts->ar_title,['class'=>'form-control']) !!}
          <p class="help-block">{{$errors->first('ar_name')}}</p>
      </div>


            @if(!empty($posts->news_gallary()->get()) && ($posts->news_gallary()->get()) != null)
                <div class="col-sm-12">
                    @foreach($posts->news_gallary()->get() as $media)

                        <img src="{{ asset('upload/products/'.$media->media)}}" style="width: 150px;height: 150px;" />
                        <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#del_admin{{$media->id}}">Delete</button>


                    @endforeach
                </div>
            @endif
            <div class="imageUpload col-sm-12 form-group">
                <div class="col-sm-1 pull-right" style="margin-top: 25px">
                    <a class="btn btn-info addInput btn-rounded">Add</a>
                </div>
                <div class="inputDiv">
                    <div class="col-sm-10">
                        {!! Form::label('media[]',trans('admin.media')) !!}
                        <p style="color: blue">{{trans('admin.media')}} must be 180 * 180</p>
                        {!! Form::file('media[]',['class'=>'form-control']) !!}
                        <p class="help-block">{{$errors->first('media')}}</p>
                    </div>
                    <div class="col-sm-1 pull-right" style="margin-top: 25px">
                        <a class="btn btn-danger removeInput btn-rounded">Remove</a>
                    </div>
                </div>
            </div>

      <div class="form-group col-sm-12">
          {!! Form::label('ar_content',trans('admin.ar_content')) !!}
          {!! Form::text('ar_content',$posts->ar_content,['class'=>'form-control']) !!}
          <p class="help-block">{{$errors->first('ar_content')}}</p>
      </div>

      <div class="form-group col-sm-12">
     {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}
  <!-- /.box-body -->

            <!-- Modal media-->
            <div id="del_admin{{$media->id}}" class="modal fade" >
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
                        </div>
                        {!! Form::open(['id'=>'form_data','url'=>aurl('news/destroyimage/'.$media->id),'method'=>'delete']) !!}
                        {{csrf_field()}}
                        <div class="modal-body">
                            <h4>{{ trans('admin.delete_photo') }}</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.close') }}</button>
                            {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <!-- Modal media-->
		<!-- end widget div -->
        </div>
	</section>



@endsection
