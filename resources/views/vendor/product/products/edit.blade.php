@extends(app('at').'.index')
{{--@section('title')
  Edit Products
@endsection--}}
@section('up')
    {{trans('admin.products')}}
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
						
					{!! Form::open(['url'=>app('v').'/products/'.$products->id,'method'=>'put','id'=>'review-form','class'=>'smart-form','files'=>true]) !!}


							    <div class="form-group col-sm-12">
        {!! Form::label('en_name',trans('admin.en_name')) !!}
        {!! Form::text('en_name',$products->en_title,['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('en_name')}}</p>
     </div>
      <div class="form-group col-sm-12">
          {!! Form::label('ar_name',trans('admin.ar_name')) !!}
          {!! Form::text('ar_name',$products->ar_title,['class'=>'form-control']) !!}
          <p class="help-block">{{$errors->first('ar_name')}}</p>
      </div>
<div class="form-group col-sm-12">
 
        {!! Form::label('stock',trans('admin.stock')) !!}
        {!! Form::text('stock',$products->stock,['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('stock')}}</p>
     </div>
      <div class=" col-sm-12">

          <img src="{{url('/upload/products/'.$products->photo)}}" style="width: 150px;height: 150px;" />

      </div>
      <div class="form-group col-sm-12">
          {!! Form::label('photo',trans('admin.photo')) !!}
              <p style="color: blue">{{trans('admin.photo')}} must be 250 * 232</p>
          {!! Form::file('photo',['class'=>'form-control']) !!}
          <p class="help-block">{{$errors->first('photo')}}</p>
      </div>
      @if(!empty($products->products_gallary()->get()))
      <div class="col-sm-12">
          @foreach($products->products_gallary()->get() as $media)
            <img src="{{url('/upload/products/'.$media->media)}}" style="width: 150px;height: 150px;" />
             <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#del_admin{{$media->id}}">Delete</button>
              <!-- Modal -->
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
      <div class="col-sm-12">
         <div class="col-md-1"  style="background-color: {{$products->color}};height: 100px;margin-right: 25px"> </div></div>
 <div class="form-group col-sm-12">
 
        {!! Form::label('color',trans('admin.color')) !!}
        {!! Form::text('color',$products->color,['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('color')}}</p>
     </div>
   @if(!empty($products->products_color()->get()))
      <div class="col-sm-12">
          @foreach($products->products_color()->get() as $color)
            <div class="col-md-1"  style="background-color: {{$color->color}};height: 100px;margin-right: 25px">     <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#del_color{{$color->id}}">Delete</button></div>
        
              <!-- Modal -->
          @endforeach
      </div>
      @endif
      <div class="colorUpload col-sm-12 form-group ">
          <div class="col-sm-1 pull-right" style="margin-top: 25px">
              <a class="btn btn-info btn-rounded addcolor">Add</a>
          </div>
          <div class="colorDiv">
              <div class="col-sm-10">
         
        {!! Form::label('colorx[]',trans('admin.colorx')) !!}
        {!! Form::text('colorx[]',null,['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('colorx')}}</p>
              </div>
              <div class="col-sm-1 pull-right" style="margin-top: 25px">
                  <a class="btn btn-danger btn-rounded removecolor">Remove</a>
              </div>
          </div>
      </div>

   <div class="form-group col-sm-12">
        {!! Form::label('size',trans('admin.size')) !!}
        {!! Form::text('size',$products->size,['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('size')}}</p>
     </div>
       @if(!empty($products->products_size()->get()))
      <div class="col-sm-12">
          @foreach($products->products_size()->get() as $size)
            <div class="col-md-2" style="height: 100px;margin-right: 25px;margin-bottom: 25px"><h1>{{$size->size}}</h1> <button type="button" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#del_size{{$size->id}}">Delete</button>
            </div>
              <!-- Modal -->
          @endforeach
      </div>
      @endif
    <div class="sizeUpload col-sm-12 form-group ">
          <div class="col-sm-1 pull-right" style="margin-top: 25px">
              <a class="btn btn-info btn-rounded addsize">Add</a>
          </div>
          <div class="sizeDiv">
              <div class="col-sm-10">
               {!! Form::label('sizex[]',trans('admin.sizex')) !!}
        {!! Form::text('sizex[]',null,['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('sizex')}}</p>
              </div>
              <div class="col-sm-1 pull-right" style="margin-top: 25px">
                  <a class="btn btn-danger btn-rounded removesize ">Remove</a>
              </div>
          </div>
      </div>



    <div class="form-group col-sm-12">
        {!! Form::label('price',trans('admin.price')) !!}
        {!! Form::text('price',$products->price,['class'=>'form-control']) !!}
         <p class="help-block">{{$errors->first('price')}}</p>
     </div>


	  <div class="form-group col-sm-12">
          {!! Form::label('en_content',trans('admin.en_content')) !!}
          {!! Form::text('en_content',$products->en_content,['class'=>'form-control']) !!}
          <p class="help-block">{{$errors->first('en_content')}}</p>
      </div>

      <div class="form-group col-sm-12">
          {!! Form::label('ar_content',trans('admin.ar_content')) !!}
          {!! Form::text('ar_content',$products->ar_content,['class'=>'form-control']) !!}
          <p class="help-block">{{$errors->first('ar_content')}}</p>
      </div>

	   <div class="form-group col-sm-12">
			@if(count($department) > 0 )
				<script type="text/javascript">
                    $(document).on('click','.movedep',function(){
                        $('.updatedepartment').toggleClass('hidden');
                        return false;
                    });
				</script>
				<div class="form-group">
					<a href="#" class="btn btn-danger movedep">{{trans('admin.move_department')}}</a>
				</div>

				<div class="updatedepartment hidden">
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
					 </div>

				<div class="form-group col-sm-12">
					<div class="result">

					</div>
				</div>
					<p><i class="fa fa-spinner fa-spin fa-2x hidden spin_dep"></i></p>
				</div>
							<footer>
								<button type="submit" class="btn btn-primary" style="margin-top: 20px">
									{{trans('admin.save')}}
								</button>
							</footer>
						{!! Form::close() !!}
    @if(!empty($products->products_gallary()->get()))
    <div id="del_admin{{$media->id}}" class="modal fade" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
                </div>
                {!! Form::open(['id'=>'form_data','url'=>v('products/destroyimage/'.$media->id),'method'=>'delete']) !!}
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
    @endif
       @if(!empty($products->products_color()->get()))
    <div id="del_color{{$color->id}}" class="modal fade" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
                </div>
                {!! Form::open(['id'=>'form_data','url'=>v('products/destroycolor/'.$color->id),'method'=>'delete']) !!}
                <div class="modal-body">
                    <h4>{{ trans('admin.delete_color') }}</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.close') }}</button>
                    {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endif
           @if(!empty($products->products_size()->get()))
    <div id="del_size{{$size->id}}" class="modal fade" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
                </div>
                {!! Form::open(['id'=>'form_data','url'=>v('products/destroysize/'.$size->id),'method'=>'delete']) !!}
                <div class="modal-body">
                    <h4>{{ trans('admin.delete_color') }}</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.close') }}</button>
                    {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endif
		<!-- end widget div -->
	</section>
	</div>


@stop