<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Country;
use App\Model\Products;
use App\Model\SupportTickets;
use App\Model\Agent;
use App\Model\DepartmentProducts;
use Hash;

class ProfilesController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('front.profile.dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        $products1 = Products::where([
            ['user_id',auth()->id()],
            ['user_type','user'],
            ['type','1'],
            ])->with('products_gallary')->orderBy('id','desc')->limit(100)->get();
        $products2 = Products::where([
            ['user_id',auth()->id()],
            ['user_type','user'],
            ['type','2'],
            ])->with('products_gallary')->orderBy('id','desc')->limit(100)->get();
        return view('front.profile.myproducts',compact('products1','products2'));
    }

    //For fetching cities
    public function getCities($id)
    {
        $cities= Country::where("parent",$id)
                    ->pluck("country_name_ar","id");
        return response()->json($cities);
    }

    //For fetching Departments
    public function getDepts($id)
    {
        $depts= DepartmentProducts::where("parent",$id)
                    ->pluck("ar_name","id");
        return response()->json($depts);
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $countries = Country::whereNull('parent')->get();
        $agents = Agent::get();
        $ticket = SupportTickets::where('user_id',auth()->id())->where('level','deserve')->count();
        $user = User::with('user_main_country','user_country')->where('id',auth()->id())->first();
        return view('front.profile.edit', [
            'edit' => $user,
            'countries' => $countries,
            'agents' => $agents,
            'ticket' => $ticket,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
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
        session()->flash('success', trans("admin.edit Successfully"));
        return  redirect()->back();
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
        session()->flash('success', trans("admin.request Successfully"));
        return  redirect()->back();
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
        session()->flash('success', trans("admin.edit Successfully"));
        return  redirect()->back();
    }


    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @param  bool  $redirect
    * @return \Illuminate\Http\Response
    */
   public function delete()
   {
       User::where('id',auth()->id())->delete();
       return  redirect()->back();
   }

}
