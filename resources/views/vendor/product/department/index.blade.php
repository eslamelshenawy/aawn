@extends(app('at').'.index')
{{--@section('title')
    Product Departments
@endsection--}}
@section('up')
    {{trans('admin.depatments')}}
@endsection
@section('content')


	<!-- Small boxes (Stat box) -->

	<div class="box box-info">
		<div class="box-header">
			<div class="col-md-2">
				<h3 class="box-title">
					<a href="{{url(app('v').'/department_product/create')}}" class="btn  btn-success btn-app">
						<i class="fa fa-plus"></i>	{{trans('admin.add')}}
					</a>
				</h3>
			</div>
			<div class="col-md-4 col-md-offset-2">
				<h3>
					
				</h3>
			</div>
		</div>
	</div>

	<section class="content">
		<!-- widget content -->
		<div class="widget-body no-padding">

			<table class="table table-striped table-bordered table-hovered">
				<tr>
					<td>{{ trans('admin.country_name_en') }}</td>
						<td>{{ trans('admin.country_name_ar') }}</td>
					
					<td>{{trans('admin.action')}}</td>
				</tr>
				@foreach($alldep as $dep)
					<tr>
							<td>
								@if(App\Model\DepartmentProducts::where('parent','=',$dep->id)->count() > 0)
									<a href="{{url(app('v').'/department_product?department='.$dep->id)}}">{{ $dep->en_name}}</a>
								@else
									{{ $dep->en_name }}
								@endif
							</td>
							<td>
								@if(App\Model\DepartmentProducts::where('parent','=',$dep->id)->count() > 0)
									<a href="{{url(app('v').'/department_product?department='.$dep->id)}}">{{ $dep->ar_name }}</a>
								@else
									{{ $dep->en_name }}
								@endif
							</td>
						
						<td>
						<a href="{{url(app('v').'/department_product/'.$dep->id.'/edit')}}" class="btn btn-info">{{trans('admin.edit')}}</a>

												{!! Form::open(['method'=>'delete','url'=>app('v').'/department_product/'.$dep->id,'style'=>'display:inline','class'=>'form'.$dep->id]) !!}

						
						<a type="button" href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
								{{trans('admin.delete')}}
							</a>
							<div class="modal modal-danger fade" id="modal-danger">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title">{{trans('admin.ask_to_delete')}}</h4>
										</div>
										<div class="modal-body">
											<p>{{trans('admin.ask_to_delete')}}&hellip;</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">{{trans('admin.no')}}</button>
											<button  href="{{url(app('v').'/department_product/'.$dep->id)}}" type="submit" class="btn btn-outline">{{trans('admin.yes')}}</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
					{!! Form::close() !!}
					</td>
					</tr>
				@endforeach
			</table>


			<!-- end widget content -->

		</div>
		<!-- end widget div -->
	</section>
	</div>
	<!-- end widget -->

@stop