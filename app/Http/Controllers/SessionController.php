<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\User;
class SessionController extends Controller
{

    public function sessionStore()
    {
    	if(!auth()->attempt(request(['email', 'password'])))
    	{
    		return back()->with('loginerror', 'Email or password not correct !');
    	}

    	return redirect('checklogin');
    }

    public function destroy()
    {
    	auth()->logout();
    	return redirect('/');
    }

    public function store(Request $request){

        $this->validate(request(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'level' => 'required|',
                'password' => 'required|min:6'
            ]);
        $data = new User();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make(request('password'));
        $data->level = $request->level;
        if($request->level == 'vendor'){
            $data->status= 0;
            session()->flash('success', 'Vendor has been added');
         
        }else{
            session()->flash('success', 'User has been added');
            $data->status= 1;
        }

        $data->save();

        return redirect(url('login'));

    }

    //back
    // public function adminSessionStore()
    // {
    // 	if(!auth()->attempt(request(['email', 'password'])))
    // 	{
    // 		return back()->with('loginerror', 'Email or password not correct !');
    // 	}
    // 	return redirect('adminchecklogin');
    // }

    public function adminSessionStore()
    {
      //return request('password');
      if(!auth()->guard('admin')->attempt(request(['email', 'password'])))
      {
        return back()->with('loginerror', 'Email or password not correct !');
      }
      return redirect('adminchecklogin');
    }
}
