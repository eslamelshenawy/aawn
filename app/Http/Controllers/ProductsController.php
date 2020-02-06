<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Products;
use App\Model\Interest;
use App\Model\OrderItem;
use App\Model\Country;
use App\Model\ProductsGallary;
use App\Model\DepartmentProducts;
use App\Jobs\SendInterestEmail;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Abraham\TwitterOAuth\TwitterOAuth;
use League\OAuth1\Client\Server\Twitter;

class ProductsController extends Controller
{

    public function makeTweet($value)
    {
        //Send Tweet In Twitter
        $connection = new TwitterOAuth(
            'lWJVmJHOqWL37PWFqhsbmfO3R', // Information about your twitter API
            'IxI6bk38UIzXqn1ZbkaG97KLmGQwPPJZWGHKUnagaIWLRi4lSW', // Information about your twitter API
            '1207291699606835200-eZcr8ALQnNhxVtjgq8JxLbHaucsEOW', // You get token from user, when him  sigin to your app by twitter api
            'MTH7KMWxY49QuV4eIwLVqxqxm3bv2nEJUFHQ7zZzvIqWj'// You get tokenSecret from user, when him  sigin to your app by twitter api
        );
        $connection->post("statuses/update", ["status" => $value]);
        //End Send Twitter
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type,$dept=null)
    {
        $city = null;
        $dep_id = null;
        $main_dep_id = null;
        $dept_name = null;
        $main_dep_name = null;
        $parent = null;
        if($type == '3'){
            $product = Products::whereIn('type',['1','2']);
        }else{
            $product = Products::where('type',$type);
        }
        if($dept){
            $product->where('dep_id',$dept);
            $departments = DepartmentProducts::where('id',$dept)->first();
            $parent = DepartmentProducts::where('id',$departments->parent)->first();
            $dept_name = $departments->ar_name ?? "";
        }
        if(filled(request()->main_dep_id)){
            $main_dep_id = request()->main_dep_id;
            $main_dep_name = DepartmentProducts::where('id',request()->main_dep_id)->first()->ar_name ?? "";
            $product->where('main_dep_id',request()->main_dep_id);
        }
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

        // set url path for generated links
        $products->setPath(request()->url());
        return view('front.products.index',compact('products','city','dept_name','main_dep_id','type','main_dep_name','parent','count','dep_id'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $departments = DepartmentProducts::where('parent','0')->get();
        $countries   = Country::whereNull('parent')->get();
        return view('front.products.create',compact('departments','countries','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // Validation
       $main_dept = implode(',', DepartmentProducts::where('parent','0')->get()->pluck("id")->toArray());
       $sub_dept = implode(',', DepartmentProducts::where('parent','!=','0')->get()->pluck("id")->toArray());
       $country = implode(',', Country::whereNull('parent')->get()->pluck("id")->toArray());
       $city = implode(',', Country::whereNotNull('parent')->get()->pluck("id")->toArray());
       $this->rules['type'] = 'required|in:1,2';
       $this->rules['ar_title'] = 'required|max:200';
       $this->rules['main_dep_id'] = 'required|in:'.$main_dept;
       $this->rules['dep_id'] = 'required|in:'.$sub_dept;
       $this->rules['main_country_id'] = 'required|in:'.$country;
       $this->rules['country_id'] = 'required|in:'.$city;
       $this->rules['ar_content'] = 'required';
       $this->rules['stock'] = 'sometimes|nullable|numeric';
       $this->rules['price'] = 'sometimes|nullable|numeric';
       $this->rules['image'] = 'sometimes|nullable|array';
        $this->rules['image.*'] = 'required|image';
       $data = $this->validate($request, $this->rules);

       //Create Adds
       $data['user_id'] = auth()->id();
       $data['user_type'] = 'user';
       $products = Products::create($data);
       //Add Images
       //multiupload photos to table product_gallary
       $path     = public_path().'/upload/products';
       if ($request->hasFile('image')) {
           $multifile     = $request->file('image');
           foreach ($multifile as $files)
           {
               $multiadd = new ProductsGallary;
               $fileName = str_random(5)."-".time()."-".str_random(3).".".$files->getClientOriginalExtension();
               if($files->move($path,$fileName))
               {
                   $multiadd->product_id = $products->id;
                   $multiadd->media = $fileName;
                   $multiadd->save();
               }

           }
       }else{
            $multiadd = new ProductsGallary;
            $multiadd->product_id = $products->id;
            $multiadd->media = "placeholder-slider.svg";
            $multiadd->save();
       }
       //@$this->makeTweet(limit($products->ar_content)." URL: ".url('/prod/show/'.$products->id)); // Send Tweet To Twitter Page

      $users_interests = Interest::with('user')->where('department_id',$request->dep_id)->get();
      if(!empty($users_interests)){
          $counter = 0;
          foreach ($users_interests as $user) {
              if(!empty($user->user)){
                  if(strpos($user->user->email,'@') !== false){
                      $user_array = [ 'name'=>$user->user->name ?? '','email'=>$user->user->email ?? '','product_id'=>$products->id,'title' => $request->ar_title];
                      @SendInterestEmail::dispatch($user_array)->delay(now()->addSeconds($counter * 10));
                      $counter++;
                  }
              }

          }
      }
      //Success Message
       session()->flash('success', trans("admin.add Successfully"));
       return redirect()->back();
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = DepartmentProducts::where('parent','0')->get();
        $countries   = Country::whereNull('parent')->get();
        $edit = Products::where('id',$id)->where('user_id',auth()->id())->with('products_gallary','product_dep','product_dep_main','product_country','product_country_main','product_vendor')->firstOrFail();
        return view('front.products.edit',compact('departments','countries','id','edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       $product = Products::where('id',$id)->where('user_id',auth()->id())->firstOrFail();
       // Validation
       $main_dept = implode(',', DepartmentProducts::where('parent','0')->get()->pluck("id")->toArray());
       $sub_dept = implode(',', DepartmentProducts::where('parent','!=','0')->get()->pluck("id")->toArray());
       $country = implode(',', Country::whereNull('parent')->get()->pluck("id")->toArray());
       $city = implode(',', Country::whereNotNull('parent')->get()->pluck("id")->toArray());
       $this->rules['type'] = 'required|in:1,2';
       $this->rules['ar_title'] = 'required|max:200';
       $this->rules['main_dep_id'] = 'required|in:'.$main_dept;
       $this->rules['dep_id'] = 'required|in:'.$sub_dept;
       $this->rules['main_country_id'] = 'required|in:'.$country;
       $this->rules['country_id'] = 'required|in:'.$city;
       $this->rules['ar_content'] = 'required';
       $this->rules['stock'] = 'sometimes|nullable|numeric';
       $this->rules['price'] = 'sometimes|nullable|numeric';
       $this->rules['image'] = 'required|array';
       $this->rules['image.*'] = 'required|image';
       $data = $this->validate($request, $this->rules);

       //Create Adds
       $data['user_id'] = auth()->id();
       $data['user_type'] = 'user';
       $products = $product->update($data);
      //Add Images
      //multiupload photos to table product_gallary
      $path     = public_path().'/upload/products';
          if ($request->hasFile('image')) {
      $multifile     = $request->file('image');
       foreach ($multifile as $files)
        {
             $multiadd = new ProductsGallary;
             $fileName = str_random(5)."-".time()."-".str_random(3).".".$files->getClientOriginalExtension();
             if($files->move($path,$fileName))
             {
                 $multiadd->product_id = $id;
                 $multiadd->media = $fileName;
                 $multiadd->save();
              }

        }
      }
      //Success Message
       session()->flash('success', trans("admin.add Successfully"));
       return redirect()->back();
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::where('id',$id)->with('products_gallary','product_dep','product_dep_main','product_country','product_country_main','product_vendor')->firstOrFail();

        if($product->type == '1'){
            $prods   = Products::with('products_gallary')->orderBy('id','desc')->where('stock','>','0')->where('type','1')->where('id','!=',$id)->limit(6)->get()->sortByDesc('sorting');
        }else{
            $prods   = Products::with('products_gallary')->orderBy('id','desc')->where('stock','>','0')->where('type','2')->where('id','!=',$id)->limit(6)->get()->sortByDesc('sorting');
        }
        return view('front.products.show',compact('product','prods'));
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
           ['product_id',$id],
           ])->delete();
       $product = Products::where([
           ['user_id',auth()->id()],
           ['user_type','user'],
           ['id',$id],
           ])->firstOrFail();
       $product->delete();

   }


   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @param  bool  $redirect
   * @return \Illuminate\Http\Response
   */
  public function image()
  {
      if (request()->filled('id')) {
          $id = request()->id;
      }

        $product = ProductsGallary::where([
            ['id',$id],
            ])->firstOrFail();
            $products = Products::where([
                ['user_id',auth()->id()],
                ['user_type','user'],
                ['id',$product->product_id],
                ])->first();
        if($products){
            $product->delete();
        }
  }


}
