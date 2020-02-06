<?php


namespace App\Http\Controllers\Admin;

use App\Model\Agent;
use App\Model\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::all();
        return view('admin.agents.index')
            ->with('agents', $agents);
    }


    public function create()
    {
        $countries = Country::whereNull('parent')->get();/*
        return view(app('at').'.product.department.create',['title'=>trans('main.add'),'department'=>$department]);
  */
        return view('admin.agents.create',compact('countries'));
    }


    //For fetching cities
    public function getCities($id)
    {
        $cities= Country::where("parent",$id)
                    ->pluck("country_name_ar","id");
        return response()->json($cities);
    }

    public function store(Request $request)
    {
        $this->validate(request(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'numeric|sometimes|nullable',
                'country_id' => 'required',
                'address'=>'required',

            ]);
        $data = new Agent();
        $data->user_id = admin()->user()->id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->main_country_id = $request->main_country_id;

        $data->country_id = $request->country_id;
        $data->address= $request->address;
        $data->location= $request->location;

        $data->save();
        session()->flash('success', trans('admin.added'));
        return redirect(aurl('agents'));

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $AgentId = Agent::find($id);
        $countries = Country::whereNull('parent')->get();/*
        return view(app('at').'.product.department.create',['title'=>trans('main.add'),'department'=>$department]);
  */
        return view('admin.agents.create',compact('countries','AgentId'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate(request(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'numeric|sometimes|nullable',
                'country_id' => 'required',
                'address'=>'required',
            ]);

        DB::table('agents')->where('id', $id)
            ->update($data);
        /*        Agent::where('id', $id)->updated($data);*/
        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('agents'));
    }




    public function check_parent(Request $request)
    {
        if($request->ajax())
        {
            if($request->has('parent') && $request->input('parent') > 0)
            {
                $dep = Country::where('parent','=',$request->input('parent'))->get();
                $data = view(app('at').'.agents.sub',['department'=>$dep,'parent'=>$request->input('parent')])->render();
                if(!empty($data))
                {
                    return response()->json($data);
                }else{
                    return response()->json('false');
                }
            }
        }
    }
    public function destroy($id)
    {
        $delete =  Agent::find($id);
        $delete->delete();
     //   $affected = SupportTickets::where('agent_id', '=', $id)->get()->all();
       // foreach ($affected as $affectedRows){
         //        $affectedRows->delete();

        //}

        session()->flash('success',trans('admin.deleted'));
        return back();
    }


}
