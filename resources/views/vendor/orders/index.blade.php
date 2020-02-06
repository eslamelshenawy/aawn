@extends('admin.index')

{{--@section('title')
    All Users
@endsection--}}
@section('up')
    {{trans('admin.orders')}}
@endsection
@section('content')


    <!-- Column selectors -->
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">All {{trans('admin.orders')}}</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                  
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

    

         <div class="table-responsive">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th class="col-sm-1">Order Code</th>
                            <th class="col-sm-1">Image</th>
                            <th class="col-sm-1">Product Name</th>
                            <th class="col-sm-1">Price</th>
                            <th class="col-sm-1">status</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($orderItem as $products)
                       <?php $detail=App\Model\Products::where('id','=',$products->product_id)->get(); ?>
                      @foreach($detail as $details)
                        <tr>
                            <td>{{$products->order_dd()->first()->code}}</td>
                    
                       <td class="product-thumbnail">
                        <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{url('public/upload/products/'.$details->photo)}}">
                       </td>
                            <td>
                              <h6 class="no-margin">{{$details->en_title}}</h6>
                             
                            </td>
                            
                            <td>{{$products->item_price}} LE</td>
                            
                     <td>{{$products->order_dd()->first()->level}}</td>
               
                        </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>



@endsection