@extends(app('at').'.index')
{{--@section('title')
    Products
@endsection--}}
@section('up')
    {{trans('admin.news')}}
@endsection
@section('content')

	
		   <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{$title}}</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a href="{{url(app('aurl').'/department_news/create')}}"><span class="label border-left-primary label-striped">{{trans('admin.add')}}</span></a>
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
		 						<td>{{ trans('admin.ar_name') }}</td>
								
		 						<td>{{trans('admin.edit')}}</td>
		 						<td>{{trans('admin.delete')}}</td>
		 					</tr>	
		 					</thead>
		 					@foreach($allneews as $products)
		 					<tr>
								<td>{{ $products->ar_name }}</td>
							
						
                        
						
								<td>
		 							<a href="{{url(app('aurl').'/department_news/'.$products->id.'/edit')}}" class="btn btn-info">{{trans('admin.edit')}}</a>
		 							{!! Form::open(['method'=>'delete','url'=>app('aurl').'/department_news/'.$products->id,'style'=>'display:inline','class'=>'form'.$products->id]) !!} 
		 						</td>
		 						<td>
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
													<button  href="{{url(app('aurl').'/department_news/'.$products->id)}}" type="submit" class="btn btn-outline">{{trans('admin.yes')}}</button>
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
				

		</div>
		<!-- end widget div -->


@endsection