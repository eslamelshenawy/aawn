<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;
use Socialite;
use Mail;
use App\Mail\Active;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
    * Show the application dashboard.
    *url /register/store [POST]
    * @return \Illuminate\Http\Response
    */
    public function registerStore(Request $request)
    {
        //Validation
        $data = $this->validate($request, [
            'name'=>'required|min:6',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
            'accept'=>'required', // For Confirm Accept Terms
            'phone'=>'sometimes|nullable|numeric',
            'main_country_id'=>'sometimes|nullable|exists:countries,id',
            'country_id'=>'sometimes|nullable|exists:countries,id',

        ]);
        $data['password'] = Hash::make($request->password); // Hash Password
        $data['status']   = '0';
        $data['provider'] = 'site';
        $data['active']   = mt_rand(1111111111,9999999999);
        $data['ip']       = getUserIP();
        $user = User::Create($data); //Make Register
        Mail::to($request->email)->send(new Active($user));
        return redirect(url('/'))->with(['success' => trans('auth.active_confirm')]); // Success Message
    }


        /**
        * [Active description]
        * @return [type] [description]
        */
        public function active($active)
        {
            $user = User::where('active',$active)->where('status','0')->firstOrFail();
            $user->update(['status' => '1','active' => null]);
            auth()->login($user);
            return redirect(url('/'))->with(['success' => trans('auth.active_success')]); // Success Message
        }

    /**
    * [store description]
    * @param  Request $request [description]
    * url /login/store [POST]
    * @return [type]           [description]
    */
    public function loginStore(Request $request)
    {
        //Validation
        $data = $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required',
        ]);
        //IF Check On Remember Me
        if($request->remember == "on"){
            $remember = true;
        }else{
            $remember = false;
        }
        $email = User::where('email',$request->email)->first();
        if(!$email){
            return redirect('/login')->with([
            'error' => trans('auth.login_fail'),
            ]);
        }
        $user = User::where('email',$request->email)->where('status','1')->first();
        if(!$user){
            return redirect('/login')->with([
            'error' => trans('auth.active_fail'),
            ]);
        }
        //Succes Message
        if(auth()->attempt($data,$remember)){
            $user->update(['ip' => getUserIP()]);
            return redirect('/index')->with([
            'success' => trans('auth.login_success'),
            ]);
        }
        //Error  Message
        return redirect('/login')->with([
        'error' => trans('auth.login_fail'),
        ]);
    }

    /**
    * [logout description]
    * @return [type] [description]
    */
    public function logout()
    {
        auth()->logout();
        return redirect(url('/'))->with(['success' => trans('auth.logout_success')]); // Success Message
    }




    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
    * Obtain the user information from GitHub.
    *
    * @return \Illuminate\Http\Response
    */
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $email = $user->email ?? $user->id;
        $newuser = User::where('email', $email)->first();

        if (!$newuser) {
            $newuser = User::create([
            'name' => $user->name,
            'email' => $email,
            'password' => $user->token,
            'status' => '1',
            'provider' => 'facebook',
            ]);
        }
        auth()->login($newuser, true);
        return redirect('/public/')->with([
        'success' => trans('auth.login_success'),
        ]);
    }



    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
    * Obtain the user information from GitHub.
    *
    * @return \Illuminate\Http\Response
    */
    public function handleTwitterCallback()
    {
        $user = Socialite::driver('twitter')->user();
        $email = $user->email ?? $user->id;
        $newuser = User::where('email', $email)->first();

        if (!$newuser) {
            $newuser = User::create([
            'name' => $user->name,
            'email' => $email,
            'password' => $user->token,
            'status' => '1',
            'provider' => 'twitter',
            ]);
        }
        auth()->login($newuser, true);
        return redirect('/public/')->with([
        'success' => trans('auth.login_success'),
        ]);
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
    * Obtain the user information from GitHub.
    *
    * @return \Illuminate\Http\Response
    */
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $email = $user->email ?? $user->id;
        $newuser = User::where('email', $email)->first();

        if (!$newuser) {
            $newuser = User::create([
            'name' => $user->name,
            'email' => $email,
            'password' => $user->token,
            'status' => '1',
            'provider' => 'gmail',
            ]);
        }
        auth()->login($newuser, true);
        return redirect('/public/')->with([
        'success' => trans('auth.login_success'),
        ]);
    }



    public function redirectToInstagram()
    {
        return Socialite::driver('instagram')->redirect();
    }

    /**
    * Obtain the user information from GitHub.
    *
    * @return \Illuminate\Http\Response
    */
    public function handleInstagramCallback()
    {
        $user = Socialite::driver('instagram')->user();
        $email = $user->email ?? $user->id;
        $newuser = User::where('email', $email)->first();

        if (!$newuser) {
            $newuser = User::create([
            'name' => $user->name,
            'email' => $email,
            'password' => $user->token,
            'status' => '1',
            'provider' => 'instagram',
            ]);
        }
        auth()->login($newuser, true);
        return redirect('/public/')->with([
        'success' => trans('auth.login_success'),
        ]);
    }


}
