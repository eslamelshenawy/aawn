<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Model\DepartmentNews as Dep;

class DepNews extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allneews = Dep::orderBy('id','desc')->paginate(10);
           return view(app('at').'.news.department.index',
            ['title'=>trans('admin.department_news'),
                'allneews'=>$allneews,
                
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(app('at').'.news.department.create',['title'=>trans('admin.add')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules = [
            'ar_name' => 'required',
        ];

        $Validator   = Validator::make($request->all(),$rules);
        $Validator->SetAttributeNames ([
            'ar_name' => trans('admin.ar_name'),
        ]);
        if($Validator->fails())
        {
            return back()->withInput()->withErrors($Validator);
        }else{

            $add = new Dep;
            $add->ar_name           = $request->input('ar_name');

            $add->save();
            session()->flash('success',trans('admin.added'));
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dep = Dep::find($id);

        return view(app('at').'.news.department.edit',['title'=>trans('admin.edit'),'edit'=>$dep]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $rules = [

            'ar_name' => 'required',

        ];

        $Validator   = Validator::make($request->all(),$rules);
        $Validator->SetAttributeNames ([
            'ar_name' => trans('admin.ar_name'),

        ]);
        if($Validator->fails())
        {
            return back()->withInput()->withErrors($Validator);
        }else{

            $update = Dep::find($id);
            $update->ar_name           = $request->input('ar_name');
            $update->save();
            session()->flash('success',trans('admin.updated'));
        }
        return back();
          }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response  
     */

    public function destroy($id)
    {
        $dep = Dep::find($id); 
        $dep->delete();
        session()->flash('success',trans('admin.deleted'));
        return back();
    }
}
