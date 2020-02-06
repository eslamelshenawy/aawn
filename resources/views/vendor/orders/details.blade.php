@extends(app('at').'.index')
{{--@section('title')
  Single Order
@endsection--}}
@section('up')
    {{trans('admin.order_details')}}
@endsection
@section('content')

	<div class="box box-info">
		<div class="box-header">

			<div class="col-md-12 col-md-offset-6">
			
			</div>
		</div>
	</div>
	<section class="content"><div class="panel panel-white">
            <div class="panel-heading">
              <h6 class="panel-title">Order invoice<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
              <div class="heading-elements">
                <button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-file-check position-left"></i> Save</button>
                <button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
                      </div>
            </div>

            <div class="panel-body no-padding-bottom">
              <div class="row">
            
                <div class="col-sm-6 content-group">
                  <div class="invoice-details">
                    <h5 class="text-uppercase text-semibold">Order {{$order->id}}</h5>
                    <ul class="list-condensed list-unstyled">
                      <li>Date: <span class="text-semibold">{{$order->created_at}}</span></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-lg-9 content-group">
                  <span class="text-muted">Order To:</span>
                  <ul class="list-condensed list-unstyled">
                    <li><h5>{{$order->name}}</h5></li>
                    <li><span class="text-semibold">{{$order->address}}</span></li>
                     @if(!empty( $order->country()->get()))
                       @foreach($order->country()->get() as $country)
                            <li>{{ $country->country_name_en}}</li>
                           @endforeach
                       @endif
                    <li>Egypt</li>
                   
                    <li><a href="#">{{$order->email}}</a></li>
                  </ul>
                </div>

                <div class="col-md-6 col-lg-3 content-group">
                  <span class="text-muted">Payment Details:</span>
                  <ul class="list-condensed list-unstyled invoice-payment-details">
                    <li><h5>Total Due: <span class="text-right text-semibold">{{$order->price}} LE</span></h5></li>
                   
                 
                  </ul>
                </div>
              </div>
            </div>

            <div class="table-responsive">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th class="col-sm-1">Image</th>
                            <th class="col-sm-1">Product Name</th>
                            <th class="col-sm-1">Price</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($orderItem as $products)
                        <tr>
                       <td class="product-thumbnail">
                        <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{url('/upload/products/'.$products->shoppings()->first()->photo)}}">
                       </td>
                            <td>
                              <h6 class="no-margin">{{$products->shoppings()->first()->en_title}}</h6>
                             
                            </td>
                            <td>{{$products->item_price}} LE</td>
                       
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

         
          </div>

		<!-- end widget div -->

	</div>


@stop