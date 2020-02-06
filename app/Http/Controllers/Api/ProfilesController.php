<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use App\Model\Country;
use App\Model\Products;
use App\Model\SupportTickets;
use App\Model\Agent;
use App\Model\DepartmentProducts;
use Hash;
use App\Http\Controllers\Controller;
use Validator;

class ProfilesController extends Controller
{
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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


        $id = auth()->id();
        $user = User::findOrFail($id);
        // Make Validation
        $this->rules['name'] = 'sometimes|nullable|max:200';
        $this->rules['phone'] = 'sometimes|nullable|numeric';
        $this->rules['address'] = 'sometimes|nullable|max:200';
        $this->rules['main_country_id'] = 'sometimes|nullable|exists:countries,id';
        $this->rules['country_id'] = 'sometimes|nullable|exists:countries,id';
        $data = $this->validate($request, $this->rules);
        //Update Data
        $user->update($data);
        // Success Message

        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = $lang == 'ar' ?  "تم التعديل بالنجاح":"Edit Successfully";
        $response['data'] = $user;
        
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

        // Make Validation
        $this->rules['image'] = 'required|image';
        $this->rules['agent_id'] = 'required|exists:agents,id';
        $this->rules['message'] = 'sometimes|nullable|max:600';
        $data = $this->validate($request, $this->rules);
        //Update Data
        //Add Images
         if ($request->hasFile('image')) {
             $path     = public_path().'/upload/products';
             $multiadd = new SupportTickets;
             $fileName = str_random(5)."-".time()."-".str_random(3).".".$request->file('image')->getClientOriginalExtension();
             if($request->file('image')->move($path,$fileName))
             {
                 $multiadd->user_id = auth()->id();
                 $multiadd->agent_id = $request->agent_id;
                 $multiadd->main_country_id = auth()->user()->main_country_id;
                 $multiadd->country_id = auth()->user()->country_id;
                 $multiadd->image = $fileName;
                 $multiadd->message = $request->message;
                 $multiadd->level = 'not';
                 $multiadd->seen = '0';
                 $multiadd->save();
              }
        }
        // Success Message
        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = $lang == 'ar' ?  "تم رفع رفع الصوره بالنجاح":"Upload Successfully";
        $response['data'] = $multiadd;
        
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
    public function updatePassword(Request $request)
    {

        // dd($request->all());
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
        $id = auth()->id();
        $user = User::findOrFail($id);
        // Make Validation
        $this->rules['old_password'] = 'required';
        $this->rules['password'] = 'required|min:6|confirmed';
        $data = $this->validate($request, $this->rules);
        //Update Data
       if($request->password){
           if (Hash::check($request->old_password, $user->password)) {
                $data['password'] = Hash::make($request->password);
            }else{
                return redirect()->back()->with([
                    'error' => trans("admin.password_false"),
                ]);
            }
        }else{
            $data['password'] = $user->password;
        }
        $user->update($data);
        // Success Message
        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] =$lang == 'ar' ?  "تم التعديل بالنجاح":"Edit Successfully";
        $response['data'] = $user;
        
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
    public function delete(Request $request)
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

        $user= User::where('id',auth()->id())->delete();
        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] =$lang == 'ar' ?  "تم الحذف بالنجاح":"deleted Successfully";
        $response['data'] = $user;
        
        return response()->json($response, $statusCode);    
    }
    }

 
}
