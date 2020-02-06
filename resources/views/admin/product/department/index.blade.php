@extends(app('at').'.index')
{{--@section('title')
    Product Departments
@endsection--}}
@section('up')
    {{trans('admin.depatments')}}
@endsection
@section('content')


	<!-- Small boxes (Stat box) -->

	     <div class="panel-heading">
            <h5 class="panel-title">{{$title}}</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a href="{{url(app('aurl').'/department_product/create')}}"><span class="label border-left-primary label-striped">{{trans('admin.add')}}</span></a>
                    </li>
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

			<table class="table datatable-button-html5-columns">
					<thead>
				<tr>
						<td>{{ trans('admin.country_name_ar') }}</td>

					<td>{{ trans('admin.logo') }}</td>
					<td>{{trans('admin.edit')}}</td>
		 						<td>{{trans('admin.delete')}}</td>
				</tr>
				</thead>
				@foreach($alldep as $dep)
					<tr>

							<td>
								@if(App\Model\DepartmentProducts::where('parent','=',$dep->id)->count() > 0)
									<a href="{{url(app('aurl').'/department_product?department='.$dep->id)}}">{{ $dep->ar_name }}</a>
								@else
									{{ $dep->ar_name }}
								@endif
							</td>
							<td><img src="{{ asset('upload/products/'.$dep->image)}}" style="width: 150px;height: 100px;" />
							</td>
						<td>
						<a href="{{url(app('aurl').'/department_product/'.$dep->id.'/edit')}}" class="btn btn-info">{{trans('admin.edit')}}</a>
						</td>

												{!! Form::open(['method'=>'delete','url'=>app('aurl').'/department_product/'.$dep->id,'style'=>'display:inline','class'=>'form'.$dep->id]) !!}

						<td>
						<a type="button" href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$dep->id}}">
								{{trans('admin.delete')}}
							</a>
							<div class="modal modal-danger fade" id="modal-danger{{$dep->id}}">
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
											<button  href="{{url(app('aurl').'/department_product/'.$dep->id)}}" type="submit" class="btn btn-outline">{{trans('admin.yes')}}</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
						</td>

						{!! Form::close() !!}
					</tr>
				@endforeach
			</table>
{!! str_replace('/?','?',$alldep->render()) !!}

			<!-- end widget content -->

	<!-- end widget -->

@stop
