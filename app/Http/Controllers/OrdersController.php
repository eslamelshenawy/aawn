<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Products;
use App\Model\OrderItem;
use App\Model\SupportTickets;

class OrdersController extends Controller
{

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function other()
    {
        $products = Products::where([
            ['user_id',auth()->id()],
            ['user_type','user'],
            ])->with('products_gallary','item.order_dd')->orderBy('id','desc')->paginate(20);


        return view('front.orders.other',compact('products'));
    }


    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function my()
    {
        $orders = OrderItem::with('shopping.products_gallary','order_dd')->where('user_id',auth()->id())->paginate(20);
        return view('front.orders.my',compact('orders'));
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function delivery($id)
    {
        $orders = Order::where('user_id',auth()->id())->where('id',$id)->first();
        $item = OrderItem::where('order_id',$id)->where('vendor_id',auth()->id())->where('vendor_type','user')->first();
        if($orders){
            $level = $orders->level;
        }
        elseif($item){
            $orders = Order::where('id',$id)->first();
            $level = $orders->level;
        }else{
            return back();
        }
        return view('front.orders.delivery',['level' => $level]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$product_id)
    {
        $orders = OrderItem::where('user_id',auth()->id())->where('product_id',$product_id)->first();
        if($orders){
            session()->flash('error', trans("admin.first_order"));
            return redirect()->back();
        }
       $product = Products::where('id',$product_id)->where('stock','>','0')->firstOrFail();
       if($product->user_id == auth()->id()){
           session()->flash('error', trans("admin.self_order"));
           return redirect()->back();
       }
       if($product->type == '1' && $product->price == '0'){
           $ticket = SupportTickets::where('user_id',auth()->id())->where('level','deserve')->first();
           if(!$ticket){
               session()->flash('error', trans("admin.must_agent"));
               return redirect('/agent');
           }
       }
       $order = Order::create([
           'user_id' => auth()->id(),
           'country_id' => auth()->user()->country_id ?? "",
           'name' => auth()->user()->name ?? "",
           'address' => auth()->user()->address ?? "",
           'phone' => auth()->user()->phone ?? "",
           'email' => auth()->user()->email ?? "",
           'price' => $product->price ?? "",
           'code' => "#".mt_rand(11111,99999) ?? "",
       ]);
       //Create Item
       $order_items = OrderItem::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id ?? "",
            'order_id' => $order->id ?? "",
            'vendor_id' => $product->user_id ?? "",
            'vendor_type' => $product->user_type ?? "",
            'item_price' => $product->price ?? "",
       ]);
      //Success Message
       session()->flash('success', trans("admin.request Successfully"));
       return redirect()->back();
    }



    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @param  bool  $redirect
    * @return \Illuminate\Http\Response
    */
   public function destroy()
   {
       if (request()->filled('id')) {
           $id = request()->id;
       }
       $item = OrderItem::where([
           ['user_id',auth()->id()],
           ['order_id',$id],
           ])->firstOrFail();
       $order = Order::where([
           ['user_id',auth()->id()],
           ['id',$id],
           ])->firstOrFail();
       $item->delete();
       $order->delete();
   }


   /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
   public function accept($id)
   {
       $order = OrderItem::where([
           ['vendor_id',auth()->id()],
           ['vendor_type','user'],
           ['order_id',$id],
           ])->firstOrFail();
       $product = Products::where('id',$order->product_id)->where('stock','>','0')->first();
       if(!$product){
           session()->flash('error', trans("admin.accept_refuse"));
           return redirect()->back();
       }
       $product->decrement('stock');
       $order->update(['status' => '1']);

           //Success Message
            session()->flash('success', trans("admin.accept Successfully"));
            return redirect()->back();
   }

   /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
   public function refuse($id)
   {
       $order = OrderItem::where([
           ['vendor_id',auth()->id()],
           ['vendor_type','user'],
           ['order_id',$id],
           ])->firstOrFail();
       $order->update(['status' => '2']);

           //Success Message
            session()->flash('success', trans("admin.accept Successfully"));
            return redirect()->back();
   }




}
