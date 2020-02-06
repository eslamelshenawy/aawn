@extends('admin.index')

@section('title')
     Product Departments
@endsection
@section('up')
    {{trans('admin.depatments')}}
@endsection
@section('content')

 

			<div class="jarviswidget" id="wid-id-7" data-widget-editbutton="false" data-widget-custombutton="false">
		
					
			
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>{{$title}} </h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="widget-body no-padding">
						
						{!! Form::open(['url'=>app('v').'/department_product/'.$edit->id,'method'=>'put','id'=>'review-form','class'=>'smart-form']) !!}
				

					    <div class="form-group">
					        {!! Form::label('en_name',trans('admin.en_name')) !!}
					        {!! Form::text('en_name',$edit->en_name,['class'=>'form-control']) !!}
					         <p class="help-block">{{$errors->first('en_name')}}</p>
					     </div>
					      <div class="form-group">
					          {!! Form::label('ar_name',trans('admin.ar_name')) !!}
					          {!! Form::text('ar_name',$edit->ar_name,['class'=>'form-control']) !!}
					          <p class="help-block">{{$errors->first('ar_name')}}</p>
					      </div>
							@if(count($department) > 0 and $edit->parent > 0)
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
							<div class="result">

							</div>
								<p><i class="fa fa-spinner fa-spin fa-2x hidden spin_dep"></i></p>
							</div>	

							<footer>
								<button type="submit" class="btn btn-primary">
									{{trans('admin.save')}}
								</button>
							</footer>
						{!! Form::close() !!}						
						
					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->	
		 

@stop