<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Model\News;
use App\User;
use App\Model\Agent;
use App\Model\Products;
use App\Model\Visitor;
use App\Model\ContactUs;
use App\Model\DepartmentProducts;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\SupportTickets;
use Validator;
use App\Model\AboutUs;

class AawnController extends Controller
{
    
  /**
      * home screen.
      *
      * @param  array  $data
      * @return \App\User
      */
      public function home(Request $request)
      {
        $lang = $request->input('lang');

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);

        if ($validator->fails()) {
            $statusCode = 400;
            $response["status"] = -2;
            $response['message'] = $validator->errors()->all()[0];
            return response()->json($response, $statusCode);     

        } else {


        $products   = Products::with('products_gallary')->orderBy('id','desc')->where('stock','>','0')->where('type','1')->limit(6)->get()->sortByDesc('sorting');
        $orders     = Products::with('products_gallary')->orderBy('id','desc')->where('stock','>','0')->where('type','2')->limit(6)->get()->sortByDesc('sorting');
        $news       = News::with('news_gallary')->orderBy('id','desc')->limit(1)->get()->sortBy('sorting');
        $categories = DepartmentProducts::with('department.products_dep.products_gallary')->with(['department.products_dep' => function($query){
            $query->orderBy('id','desc')->where('stock','>','0')->get()->sortBy('sorting');
        }])->where('parent','0')->limit(1)->get();

        $data=[];
        $data['new_products']=$products->values();
        // order news can buy
        $data['orders_custom']=$orders->values();
        $data['news']=$news->values();
        $data['categories']=$categories;

        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = "home";
        $response['data'] = $data;
        
        return response()->json($response, $statusCode);   
         }    

      }

  /**
      * products screen.
      *
      * @param  array  $data
      * @return \App\User
      */
      public function products(Request $request)
      {
        $lang = $request->input('lang');

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);

        if ($validator->fails()) {
            $statusCode = 400;
            $response["status"] = -2;
            $response['message'] = $validator->errors()->all()[0];
            return response()->json($response, $statusCode);     

        } else {

        $products   = Products::with('products_gallary')->orderBy('id','desc')->where('stock','>','0')->where('type','1')->get()->sortByDesc('sorting');
        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = "products";
        $response['data'] = $products;
        
        return response()->json($response, $statusCode);   
        }    

      }
  /**
      * orders custom screen.
      *
      * @param  array  $data
      * @return \App\User
      */
      public function orders(Request $request)
      {
        $lang = $request->input('lang');

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);

        if ($validator->fails()) {
            $statusCode = 400;
            $response["status"] = -2;
            $response['message'] = $validator->errors()->all()[0];
            return response()->json($response, $statusCode);     

        } else {

            // dd('dsds');
        $orders     = Products::with('products_gallary')->orderBy('id','desc')->where('stock','>','0')->where('type','2')->get()->sortByDesc('sorting');
        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = "orders";
        $response['data'] = $orders;
        
        return response()->json($response, $statusCode);     
        }  

      }
  /**
      * events screen.
      *
      * @param  array  $data
      * @return \App\User
      */
      public function Events(Request $request)
      {
        $lang = $request->input('lang');

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);

        if ($validator->fails()) {
            $statusCode = 400;
            $response["status"] = -2;
            $response['message'] = $validator->errors()->all()[0];
            return response()->json($response, $statusCode);     

        } else {


        $news = News::with('news_gallary')->orderBy('id','desc')->get()->sortBy('sorting');

        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = "Events";
        $response['data'] = $news;
        
        return response()->json($response, $statusCode);    
        }   

      }

    /**
         * Categories screen.
        *
        * @param  array  $data
        * @return \App\User
        */
        public function Categories(Request $request)
        {
            $lang = $request->input('lang');

            $validator = Validator::make($request->all(), [
                'lang' => 'required',
            ]);
    
            if ($validator->fails()) {
                $statusCode = 400;
                $response["status"] = -2;
                $response['message'] = $validator->errors()->all()[0];
                return response()->json($response, $statusCode);     
    
            } else {
    

            if($request->type == '3'){
            // type=3  كل الاقسام 
                $product = Products::whereIn('type',['1','2'])->get();
            }else{

            // type=1 is  إعلانات عرض 
            // type=2 is   إعلانات الطلب

                $product = Products::where('type',$request->type)->get();
            }
    
            $statusCode = 200;
            $response['status'] = 1;
            $response['message'] = "Categories";
            $response['data'] = $product;
            
            return response()->json($response, $statusCode);    
        }   

        }

    /**
         * Products details screen.
        *
        * @param  array  $data
        * @return \App\User
        */
        public function Products_details(Request $request)
        {
            $lang = $request->input('lang');

            $validator = Validator::make($request->all(), [
                'lang' => 'required',
            ]);
    
            if ($validator->fails()) {
                $statusCode = 400;
                $response["status"] = -2;
                $response['message'] = $validator->errors()->all()[0];
                return response()->json($response, $statusCode);     
    
            } else {
    
    
            $product = Products::where('id',$request->product_id)->with('products_gallary','product_dep','product_dep_main','product_country','product_country_main','product_vendor')->firstOrFail();
            $statusCode = 200;
            $response['status'] = 1;
            $response['message'] =  $lang == 'ar' ?  "المنتجات":"Products";
            $response['data'] = $product;
            
            return response()->json($response, $statusCode);   
            }    

        }

         /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function myorders(Request $request)
    {
        $lang = $request->input('lang');

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);

        if ($validator->fails()) {
            $statusCode = 400;
            $response["status"] = -2;
            $response['message'] = $validator->errors()->all()[0];
            return response()->json($response, $statusCode);     

        } else {

        $orders = OrderItem::with('shopping.products_gallary','order_dd')->where('user_id',auth()->id())->get();
        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = $lang == 'ar' ?  "طلباتى":"MY Orders";
        $response['data'] = $orders;
        
        return response()->json($response, $statusCode);      
        } 
    }


    /**
    * other order.
    *
    * @return \Illuminate\Http\Response
    */
    public function other_orders(Request $request)
    {
        $lang = $request->input('lang');

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);

        if ($validator->fails()) {
            $statusCode = 400;
            $response["status"] = -2;
            $response['message'] = $validator->errors()->all()[0];
            return response()->json($response, $statusCode);     

        } else {

            $products = Products::where([
                ['user_id',auth()->id()],
                ['user_type','user'],
                ])->with('products_gallary','item.order_dd')->orderBy('id','desc')->paginate(20);
    
            $statusCode = 200;
            $response['status'] = 1;
            $response['message'] = $lang == 'ar' ?  "طلبات إعلاناتى":"other Orders";
            $response['data'] = $products;
            
            return response()->json($response, $statusCode);     
        }  
        }

            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @param  bool  $redirect
            * @return \Illuminate\Http\Response
            */
        public function destroy(Request $request)
        {

            $lang = $request->input('lang');

            $validator = Validator::make($request->all(), [
                'lang' => 'required',
            ]);
    
            if ($validator->fails()) {
                $statusCode = 400;
                $response["status"] = -2;
                $response['message'] = $validator->errors()->all()[0];
                return response()->json($response, $statusCode);     
    
            } else {
    
            $id = $request->input('id');
            
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

            $data =[];
            $data['item']=$item;
            $data['order']=$order;
            $statusCode = 200;
            $response['status'] = 1;
            $response['message'] = $lang == 'ar' ?  "تم حذف الاوردر بنجاح":"Deleted Order";
            $response['data'] = $products;
            return response()->json($response, $statusCode);     
            }
        }



         /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($type,$dept=null,Request $request)
    {

        $lang = $request->input('lang');

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);

        if ($validator->fails()) {
            $statusCode = 400;
            $response["status"] = -2;
            $response['message'] = $validator->errors()->all()[0];
            return response()->json($response, $statusCode);     

        } else {

        $city = null;
        $dep_id = null;

        $product = Products::whereIn('type',['1','2']);

        if(filled(request()->city) || filled(request()->dep_id)){
            if(filled(request()->city)){
                $city = request()->city;
                $product->where('country_id',request()->city);
            }
            if(filled(request()->dep_id)){
                $dep_id = request()->dep_id;
                $product->where('dep_id',request()->dep_id);
            }
        }
        $count = $product->where('stock','>','0')->count();
        $products = $product->where('stock','>','0')->with('products_gallary','product_dep')->get()->sortBy('sorting');
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Create a new Laravel collection from the array data
        $itemCollection = collect($products);

        // Define how many items we want to be visible in each page
        $perPage = 15;

        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

        // Create our paginator and pass it to the view
        $products= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = $lang == 'ar' ?  " ":" products";
        $response['data'] = $products;
        return response()->json($response, $statusCode);     
        }


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function about(Request $request)
    {
        $lang = $request->input('lang');

        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);

        if ($validator->fails()) {
            $statusCode = 400;
            $response["status"] = -2;
            $response['message'] = $validator->errors()->all()[0];
            return response()->json($response, $statusCode);     

        } else {

        $about = AboutUs::firstOrFail();
        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = $lang == 'ar' ?  "عن  ":" products";
        $response['data'] = $about;
        return response()->json($response, $statusCode);    
        } 
    }

}
