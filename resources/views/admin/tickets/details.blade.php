@extends(app('at').'.index')
{{--@section('title')
  Single ticket
@endsection--}}
@section('up')
    {{trans('admin.ticket_details')}}
@endsection
@section('content')

	<div class="box box-info">
		<div class="box-header">

			<div class="col-md-12 col-md-offset-6">

			</div>
		</div>
	</div>
	<section class="content">
        <div class="panel panel-white">
            <div class="panel-heading">
              <h6 class="panel-title">    {{trans('admin.ticket_details')}}
                  <a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
              <div class="heading-elements">

                <button type="button" onclick="myFunction()" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
                      </div>
            </div>
                <script>
                function myFunction() {
                    window.print();
                }
                </script>

            <div class="panel-body no-padding-bottom">
              <div class="row">

                <div class="col-sm-6 content-group">
                  <div class="invoice-details">
                    <h5 class="text-uppercase text-semibold">ID : {{$ticket->id}}</h5>
                    <ul class="list-condensed list-unstyled">
                      <li>تاريخ الطلب: <span class="text-semibold">{{$ticket->created_at}}</span></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-lg-9 content-group">
                  <span class="text-muted">{{trans('admin.name')}} :</span>
                  <ul class="list-condensed list-unstyled">
                    <li><h5>{{ $ticket->user_tickets()->first()->name}}</h5></li>
                    <span class="text-muted">{{trans('admin.address')}} :</span>
                    <li><span class="text-semibold"><h5>{{$ticket->user_tickets()->first()->address
                    ?? ""}}</h5></span></li>

                            <li><h5>{{$ticket->ticket_country()->first()->country_name_ar ?? "" }}</h5></li>

                   <span class="text-muted">{{trans('admin.email')}} :</span>
                    <li><a href="#"><h5>{{$ticket->user_tickets()->first()->email ?? ""}}</h5></a></li>
                      <span class="text-muted"> {{trans('admin.agent')}} :</span>
                      <li><a href="#"><h5>{{ $ticket->ticket_agent()->first()->name ?? ""}}</h5></a></li>
                  </ul>
                </div>

                <div class="col-md-6 col-lg-3 content-group">
                         <span class="text-muted">تفاصيل الطلب</span>
                  <ul class="list-condensed list-unstyled invoice-payment-details">
                    <li><h5>رقم الطلب : <span class="text-right text-semibold">{{$ticket->id}}</span></h5></li>
                   <li><h6>حالة الطلب : <span class="text-right text-semibold">


                               @if($ticket->level== 'deserve')
                                   {{trans('admin.deserve')}}                               @else

                                   {{trans('admin.not_deserve')}}@endif
                           </span></h6></li>


                  </ul>
                    <br>


                </div>
              </div>
            </div>

            <div class="table-responsive">

                <table class="table table-lg">

                    <thead>
                      <tr>
                          <h3 class="text-center">{{trans('admin.image')}}</h3>
                      </tr>

                    </thead>
                    <tbody>

                        <tr>
                       <td class="product-thumbnail">
                            <img src="{{url('/upload/products/'.$ticket->image)}}" style="width: 400px;" /></td>
                      </tr>

                    </tbody>
                </table>
            </div>


          </div>

		<!-- end widget div -->
    </section>



@stop
