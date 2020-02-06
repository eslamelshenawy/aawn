<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Model\Products;
use App\Model\Favourite;
use App\Http\Controllers\Controller;
use Validator;

class FavouritesController extends Controller
{
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Favourite(Request $request)
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

        if(auth()->check()){
            $products = Products::where('id',$request->product_id)->first();
            if($products){
                $favourite = Favourite::where('product_id',$request->product_id)->where('type',$products->type)->where('user_id',auth()->id())->first();
                if($favourite){
                    $favourite->delete();

                    $statusCode = 400;
                    $response['status'] = 1;
                    $response['message'] = $lang == 'ar' ?  "تم الحذف من المفضله":"Deleted from favorites";
                    $response['data'] = $favourite;
                    return response()->json($response, $statusCode);               
                }else{
                   $favourite= Favourite::create([
                        'product_id' => $request->product_id,
                        'type' => $products->type,
                        'user_id' => auth()->id(),
                    ]);

                    $statusCode = 200;
                    $response['status'] = 1;
                    $response['message'] = $lang == 'ar' ?  "تم الإضافة الى المفضله بنجاح ":"Added to favorites successfully";
                    $response['data'] = $favourite;
                    return response()->json($response, $statusCode);               
                }
            }
        }else{
            $statusCode = 400;
            $response['status'] = 1;
            $response['message'] = $lang == 'ar' ?  "يجب عليك التسجيل":"You Must Login";
            $response['data'] = "";
            return response()->json($response, $statusCode);               

        }
     }
    }

}
