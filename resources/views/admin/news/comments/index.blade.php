@extends(app('at').'.index')
{{--@section('title')
    Products
@endsection--}}
@section('up')
    {{trans('admin.comments')}}
@endsection
@section('content')



		   <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">{{$title}}</h5>

        </div>

						 <table class="table datatable-button-html5-columns">
						 	<thead>
		 					<tr>
		 						<td>{{ trans('admin.name') }}</td>
								<td>{{ trans('admin.email') }}</td>
                                <td>{{ trans('admin.comment') }}</td>
		 						<td>{{trans('admin.delete')}}</td>
		 					</tr>
		 					</thead>
		 					@foreach($comments as $comment)
		 					<tr>
								<td>{{ $comment->user->name ?? "" }}</td>
                                <td>{{ $comment->user->email ?? "" }}</td>
                                <td>{{ $comment->comment ?? "" }}</td>

								<td>
                                    <form id="form-id{{ $comment->id  }}" action="{{ route('comments.destroy', [$comment->id]) }}" style="display:inline;" method="post">
                                            {!! csrf_field() !!}
                               </form>
                               <a href="#" onclick="document.getElementById('form-id{{ $comment->id }}').submit();" class="btn btn-danger btn-min-width btn-glow mr-1 mb-1" ><i
                                   class="ft-delete"></i> {{ trans('admin.delete') }}</a>
		 						</td>

		 					</tr>
		 					@endforeach
		 				</table>
				{{--	 {!! str_replace('/?','?',$allproducts->render()) !!}--}}

		</div>
		<!-- end widget div -->


@endsection
