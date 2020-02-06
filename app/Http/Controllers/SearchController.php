<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\DepartmentProducts as Dep;
use App\Model\Products ;

class SearchController extends Controller
{
    public function searchName(Request $request){
 $id = $request['product_cat'];
        if($request['product_cat'] == '0'){

            $ProductName =  Products::where('ar_title', $request['nameSearch'])
                ->orWhere('ar_title', 'like', '%' . $request['nameSearch'] . '%')->get();

            $brands=Dep::where('parent','>',0)->get();
            $departments=Dep::where('parent',0)->get();
            $widget = Products::orderBy('id','desc')->take(5)->get();
            $department  = Dep::find($id);
            $lastPosted = Products::take(5)->orderBy('id','desc')->get();

          if(isset($ProductName) && count($ProductName) > 0 ){
              return view('front.search_product')->with(['lastPosted'=>$lastPosted , 'departments'=>$departments ,'widget'=>$widget ,'brands'=> $brands ,'ProductName' => $ProductName ,'brands'=> $brands ]);
          }else{
              $brands=Dep::where('parent','>',0)->get();
              $departments=Dep::where('parent',0)->get();
              $widget = Products::orderBy('id','desc')->take(5)->get();
              $department  = Dep::find($id);
              $lastPosted = Products::take(5)->orderBy('id','desc')->get();

              $ProductName =  Products::where('en_title', $request['nameSearch'])
                  ->orWhere('en_title', 'like', '%' . $request['nameSearch'] . '%')->get();
              return view('front.search_product')->with(['lastPosted'=>$lastPosted , 'departments'=>$departments ,'widget'=>$widget ,'brands'=> $brands ,'ProductName' => $ProductName ,'brands'=> $brands ]);
          }
        }else{

 $sub  = Dep::where('parent',$request['product_cat'])->select('id')->get();

  if (count($sub) > 0 ){
          
 
  if( $request['nameSearch'] != ''){

                      $ProductName =  Products::Where('en_title', $request['nameSearch'])
                ->orWhere('en_title', 'like', '%' . $request['nameSearch'] . '%')->
                orWhere('ar_title', $request['nameSearch'])
                ->orWhere('ar_title', 'like', '%' . $request['nameSearch'] . '%')->get();
               
                }else{ 

            $ProductName = Products::Where('main_dep_id', $request['product_cat'])->get();

               




             
 
                 

              }

            $brands=Dep::where('parent','>',0)->get();
            $departments=Dep::where('parent',0)->get();
            $widget = Products::orderBy('id','desc')->take(5)->get();
            $department  = Dep::find($id);
            $lastPosted = Products::take(5)->orderBy('id','desc')->get();
                              return view('front.search_product')->with(['lastPosted'=>$lastPosted , 'departments'=>$departments ,'widget'=>$widget ,'brands'=> $brands ,'ProductName' => $ProductName ,'brands'=> $brands ]);
        
             
           
         }
 
   }             
        }
    }
