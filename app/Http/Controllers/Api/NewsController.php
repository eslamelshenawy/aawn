<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
use App\Model\Comment;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Validator;

class NewsController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function events_details(Request $request)
    {

        $lang = $request->input('lang');
        $id = $request->input('event_id');
        $validator = Validator::make($request->all(), [
            'lang' => 'required',
        ]);

        if ($validator->fails()) {
            $statusCode = 400;
            $response["status"] = -2;
            $response['message'] = $validator->errors()->all()[0];
            return response()->json($response, $statusCode);     

        } else {

        $news = News::with('city','country','news_gallary','comment.user')->where('id',$id)->firstOrFail();

        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = $lang == 'ar' ?  "طلبات إعلاناتى":"other Orders";
        $response['data'] = $news;
        
        return response()->json($response, $statusCode);     
        }
    }


}
