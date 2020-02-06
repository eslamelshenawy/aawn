<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
use App\Model\Interest;

class InterestsController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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

        $interests = Interest::where('user_id',auth()->id())->get()->pluck('department_id')->toArray();
        $departments = DepartmentProducts::where('parent','!=','0')->get();

        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = $lang == 'ar' ?  "الاقسام":"departments";
        $response['data'] = $departments;
        return response()->json($response, $statusCode);   
        }
    }


        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Interest(Request $request)
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


        $this->rules['department_id'] = 'required|array';
        $this->rules['department_id.*'] = 'required|exists:department_products,id';
        $data = $this->validate($request, $this->rules);
        //Create Adds
        Interest::where('user_id',auth()->id())->delete();
        foreach ($request->department_id as $department) {
            $departments= Interest::create([
                'department_id' => $department,
                'user_id' => auth()->id(),
            ]);
        }
        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = $lang == 'ar' ?  "تم التعديل بنجاح ":"Edit Successfully";
        $response['data'] = $departments;
        return response()->json($response, $statusCode);   
        }
    }


}
