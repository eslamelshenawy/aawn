@extends(app('at').'.index')
{{--@section('title')
    Products
@endsection--}}
@section('up')
    {{trans('admin.products')}}
@endsection
@section('content')



		   <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{$title}}</h5>

            <div class="heading-elements">
                <ul class="icons-list">


                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
        <form class="" action="{{ aurl('products/all/delete') }}" method="post">

        {!! csrf_field() !!}
						 <table class="table datatable-button-html5-columns">
						 	<thead>
		 					<tr>
                                <td><input type="checkbox" id="checkAll"><td>
		 						<td>{{ trans('admin.ar_name') }}</td>
								<td>{{ trans('admin.sub_to_sub') }}</td>
								<td>{{ trans('admin.price') }}</td>
                                <td>{{ trans('admin.type') }}</td>
		 						{{-- <td>{{trans('admin.edit')}}</td> --}}
		 						{{-- <td>{{trans('admin.delete')}}</td> --}}
		 					</tr>
		 					</thead>
		 					@foreach($allproducts as $products)
		 					<tr>
                                <td><input type="checkbox" name="userId[]" value="{{ $products->id }}" /><td>
								<td>{{ $products->ar_title }}</td>
								<td>
							{{$products->product_dep()->first()->ar_name ?? ""}}
								</td>

                          <td>{{ $products->price }}</td>
                          <td>{{ $products->type == '1' ? 'عرض' : 'طلب' }}</td>

								{{-- <td>
		 							<a href="{{url(app('aurl').'/products/'.$products->id.'/edit')}}" class="btn btn-info">{{trans('admin.edit')}}</a>
								</td> --}}
								{{-- {!! Form::open(['method'=>'delete','url'=>app('aurl').'/products/'.$products->id,'style'=>'display:inline','class'=>'form'.$products->id]) !!}

		 						<td>
									<a type="button" href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$products->id}}">
										{{trans('admin.delete')}}
									</a>

									<div class="modal modal-danger fade" id="modal-danger{{$products->id}}">
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
													<button  href="{{url(app('aurl').'/products/'.$products->id)}}" type="submit" class="btn btn-outline">{{trans('admin.yes')}}</button>
												</div>
											</div>
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
									<!-- /.modal -->
								</td>

								{!! Form::close() !!} --}}

		 					</tr>
		 					@endforeach
		 				</table>
                        <br />
                        <button type="submit" class="btn btn-danger center-block">{{ trans('admin.delete selected') }}</button>
                        <br /><br />
                        </form>
                        <script type="text/javascript">
                        $("#checkAll").click(function(){
                            $('input:checkbox').not(this).prop('checked', this.checked);
                        });
                        </script>
				{{--	 {!! str_replace('/?','?',$allproducts->render()) !!}--}}

		</div>
		<!-- end widget div -->


@endsection
