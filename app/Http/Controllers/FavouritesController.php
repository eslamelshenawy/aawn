<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Products;
use App\Model\Favourite;

class FavouritesController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favourites = Favourite::with('product.products_gallary')->where('user_id',auth()->id())->get();
        return view('front.favourite.index',compact('favourites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Favourite(Request $request)
    {
        if(auth()->check()){
            $products = Products::where('id',$request->product_id)->first();
            if($products){
                $favourite = Favourite::where('product_id',$request->product_id)->where('type',$products->type)->where('user_id',auth()->id())->first();
                if($favourite){
                    $favourite->delete();
                    return response()->json('2');
                }else{
                    Favourite::create([
                        'product_id' => $request->product_id,
                        'type' => $products->type,
                        'user_id' => auth()->id(),
                    ]);
                    return response()->json('1');
                }
            }
        }else{
            session()->flash('error', trans("admin.must_login"));
            return  redirect()->back();
        }

    }


}
