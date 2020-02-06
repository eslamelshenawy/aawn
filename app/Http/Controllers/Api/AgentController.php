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
use Validator;

use App\Http\Controllers\Controller;

class AgentController extends Controller
{
    
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function agent(Request $request)
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

        if(filled(request()->city)){
            $agents = Agent::with('agent_country','agent_main_country')->where('country_id',request()->city)->get()->sortBy('sorting');
        }else {
            $agents = Agent::with('agent_country','agent_main_country')->get()->sortBy('sorting');
        }
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Create a new Laravel collection from the array data
        $itemCollection = collect($agents);

        // Define how many items we want to be visible in each page
        $perPage = 20;

        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

        // Create our paginator and pass it to the view
        $agents= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

        // set url path for generated links
        $agents->setPath($request->url());
        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = $lang == 'ar' ?  "الوكلاء":"agents";
        $response['data'] = $agents;
        return response()->json($response, $statusCode);    
        } 
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
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

        //Validation
        $data = $this->validate($request,[
            'name' => 'required|max:150',
            'email' => 'required|max:150',
            'subject' => 'required|max:150',
            'message' => 'required',
        ]);
        ContactUs::create($data);

        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = $lang == 'ar' ?  "تم الارسال بالنجاح":"sent Successfully";
        $response['data'] = $data;
        return response()->json($response, $statusCode);   
        } 
    }


}
