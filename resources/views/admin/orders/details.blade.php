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
	<section class="content">
        <div class="panel panel-white">
            <div class="panel-heading">
              <h6 class="panel-title">    {{trans('admin.order_details')}}
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
                    <h5 class="text-uppercase text-semibold">كود الطلب : {{$order->code}}</h5>
                    <ul class="list-condensed list-unstyled">
                      <li>تاريخ الطلب: <span class="text-semibold">{{$order->created_at}}</span></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 col-lg-9 content-group">
                  <span class="text-muted">اسم العميل :</span>
                  <ul class="list-condensed list-unstyled">
                    <li><h5>{{$order->name}}</h5></li>
                    <span class="text-muted">العنوان :</span>
                    <li><span class="text-semibold"><h5>{{$order->address}}</h5></span></li>
                     @if(!empty( $order->country()->get()))
                       @foreach($order->country()->get() as $country)
                            <li><h5>{{ $country->country_name_en}}</h5></li>
                           @endforeach
                       @endif
                   <span class="text-muted">البريد الاليكترونى :</span>
                    <li><a href="#"><h5>{{$order->email}}</h5></a></li>
                  </ul>
                </div>

                <div class="col-md-6 col-lg-3 content-group">
                         <span class="text-muted">تفاصيل الطلب</span>
                  <ul class="list-condensed list-unstyled invoice-payment-details">
                    <li><h5>رقم الطلب : <span class="text-right text-semibold">{{$order->id}}</span></h5></li>
                    <li><h5>كود الطلب : <span class="text-right text-semibold">{{$order->code}}</span></h5></li>
                   <li><h6>حالة الطلب : <span class="text-right text-semibold">


                               @if($order->level == 'prepare')
                                   جارى اعداد المنتج
                               @elseif($order->level == 'ship')

                                   تم استلام المنتج من قبل شركة الشحن
                               @elseif($order->level == 'done')
                                   تم شحن المنتج
                               @elseif($order->level == 'reject')
                                   تم تسليم المنتج
@endif
                           </span></h6></li>

                 
                  </ul>
                    <br>
                  <span class="text-muted">تفاصيل الدفع :</span>
                  <ul class="list-condensed list-unstyled invoice-payment-details">
                      @if($order->price == 0)
                    <li><h5>السعر الكلى : <span class="text-right text-semibold">مجانى</span></h5></li>
                          @else
                          <li><h5>السعر الكلى : <span class="text-right text-semibold">{{$order->price}} {{trans('admin.sar')}}</span></h5></li>

                      @endif
                 
                  </ul>

                </div>
              </div>
            </div>

            <div class="table-responsive">

                <table class="table table-lg">
                  
                    <thead>
                      <tr>
                          <h3 class="text-center">المنتج المطلوب</h3>
                      </tr>
                        <tr>
                            <th class="col-sm-1">الصورة</th>
                            <th class="col-sm-1">الاسم</th>
                            <th class="col-sm-1">السعر</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                      
                      @foreach($orderItem as $products)
                        <tr>
                       <td class="product-thumbnail">
                        <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{url('/upload/products/'.$products->shoppings()->first()->media)}}">
                       </td>
                            <td>
                              <h6 class="no-margin">{{$products->shopping()->first()->ar_title}}</h6>
                             
                            </td>
                            @if($order->price == 0)
                                <td>مجانى</td>
                            @else
                                <td>{{$products->item_price}} {{trans('admin.sar')}}</td>

                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

         
          </div>

		<!-- end widget div -->
    </section>



@stop