<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
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

class AdvertiseController extends Controller
{
    
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
      $statusCode = 200;
       $response['status'] = 1;
       $response['message'] =  $lang == 'ar' ?  "تم الإضافه بالنجاح":"Add Successfully";
       $response['data'] = $products;
       
       return response()->json($response, $statusCode);   
}
    }


}
