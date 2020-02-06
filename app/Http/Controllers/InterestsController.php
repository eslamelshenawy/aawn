<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Interest;
use App\Model\DepartmentProducts;

class InterestsController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interests = Interest::where('user_id',auth()->id())->get()->pluck('department_id')->toArray();
        $departments = DepartmentProducts::where('parent','!=','0')->get();
        return view('front.interests.index',compact('interests','departments'));
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
        $this->rules['department_id'] = 'required|array';
        $this->rules['department_id.*'] = 'required|exists:department_products,id';
        $data = $this->validate($request, $this->rules);
        //Create Adds
        Interest::where('user_id',auth()->id())->delete();
        foreach ($request->department_id as $department) {
            Interest::create([
                'department_id' => $department,
                'user_id' => auth()->id(),
            ]);
        }
       //Success Message
        session()->flash('success', trans("admin.edit Successfully"));
        return redirect()->back();
    }


}
