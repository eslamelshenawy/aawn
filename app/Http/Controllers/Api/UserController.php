<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use App\Model\Country; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Http\Helpers\Helper;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    /**
      * Get a validator for an incoming login request.
      *
      * @param  array  $data
      * @return  function   login
      */   
    public function login(Request $request){ 


        try {

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

            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];

            // check if credentials true
            if (auth()->attempt($credentials)) {
                $token = auth()->user()->createToken('TutsForWeb')->accessToken;
                $user =auth()->user();
                $user['token']=$token ;
                $statusCode = 200;
                $response['status'] = 1;
                $response['message'] =  $lang == 'ar' ?  " تم تسجيل بنجاح":"Success Login";
                $response['data'] = $user;
                
                return response()->json($response, $statusCode);   

            } else{
                // if  credentials not true
                $statusCode = 400;
                $response['status'] = -1;
                $response['message'] = "Email or Password not true";
                return response()->json($response, $statusCode);
    
            }
          }

        } catch (Exception $e) {

            $statusCode = 400;
            $response['status'] = -1;
            $response['message'] = $e->getMessage();
            return response()->json($response, $statusCode);
        }
        finally {

            return response()->json($response, $statusCode);
        }

    }



       /**
      * Get a validator for an incoming registration request.
      *
      * @param  array  $data
      * @return  function   register
      */
      protected function register(Request $request)
      {
       try{
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

          $this->validator($request->all());
          if ($this->validator($request->all())->fails()) {
              $statusCode = 200;
              $response["status"] = -2;
              $response['message'] = Helper::ArrayToString($this->validator($request->all())->errors()->all());

          } else {
              $user = $this->create($request->all()) ;
              $statusCode = 200;
              $response['status'] = 1;
              $response['message'] =  $lang == 'ar' ?  " تم تسجيل بنجاح":"Success register";
              $response['data'] = $user;
              
              return response()->json($response, $statusCode);       

          }
        }
       }catch(Exception $e){

          $statusCode = 400;
          $response['status'] = -1;
          $response['message'] = $e->getMessage();
          return response()->json($response, $statusCode);

       }finally {
          return response()->json($response, $statusCode);
      }

      }

        /**
      * Get a validator for an incoming registration request.
      *
      * @param  array  $data
      * @return \Illuminate\Contracts\Validation\Validator
      */
     protected function validator(array $data)
     {
            $validator = Validator::make($data, [
                'name' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:6',
                'phone'=>'required|min:10|max:11',
                ]);
            return $validator;
          
     }

       /**
      * Create a new user instance after a valid registration.
      *
      * @param  array  $data
      * @return \App\User
      */
      protected function create(array $data)
      {
 
         $user= User::create([
             'name' => $data['name'],
             'email' => $data['email'],
             'password' => Hash::make($data['password']),
             'phone' => $data['phone'],  
             'main_country_id' => $data['country_id'],  
             'country_id' => $data['city_id'],  
          ]);
 
         // create  Token passport
          $token = $user->createToken('Token')->accessToken;
         
         if($user){
          $user->save();
          $user['token']=$token ;
         }
         return $user;
 
      }

    /**
      * get Countries
      *
      * @param  array  $data
      * @return \App\Model\Country
      */
      public function Countries()
      {
        $Country=Country::where("parent",null)->get();
        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = "Countries";
        $response['data'] = $Country;
        
        return response()->json($response, $statusCode);       

      }

    /**
      * get Cities
      *
      * @param  array  $data
      * @return \App\Model\Country
      */
      public function Cities(Request $request)
      {
        $Cities=Country::where("parent",$request->country_id[0])->get();
        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] = "Cities";
        $response['data'] = $Cities;
        return response()->json($response, $statusCode);       

      }

      /**
    * [logout description]
    * @return [type] [description]
    */
    public function logout(Request $request)
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

        auth()->logout();
        $statusCode = 200;
        $response['status'] = 1;
        $response['message'] =$lang == 'ar' ?  "تم تسجيل الخروج بالنجاح":"logout Successfully";
        $response['data'] = "";
        
        return response()->json($response, $statusCode);    
        }
    }


}
