<?php


namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Country;
use App\Model\BlockUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')
            ->with('users', $users);
    }

    public function block()
    {
        $id = request()->id;
        $user = User::where('id',$id)->first();
        if($user->ip){
            BlockUser::updateOrCreate(
                ['ip' => $user->ip]
            );
            session()->flash('success', trans('admin.blocked'));
            return redirect(aurl('users'));
        }
        session()->flash('error', trans('admin.not_blocked'));
        return redirect(aurl('users'));
    }

    public function create()
    {
        $countries = Country::whereNull('parent')->get();/*
        return view(app('at').'.product.department.create',['title'=>trans('main.add'),'department'=>$department]);
  */
        return view('admin.users.create',compact('countries'));
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
                'address'=>'sometimes|nullable',
                'name'=>'required|min:6',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6',
                'phone'=>'sometimes|nullable|numeric',
                'main_country_id'=>'sometimes|nullable|exists:countries,id',
                'country_id'=>'sometimes|nullable|exists:countries,id',

            ]);
        $data = new User();
        $data->user_id = admin()->user()->id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->main_country_id = $request->main_country_id;
        $data->company = $request->company;
        $data->status = '1';
        $data['password'] = bcrypt(request('password'));

        $data->country_id = $request->country_id;
        $data->address= $request->address;
        $data->location= $request->location;

        $data->save();
        session()->flash('success', trans('admin.added'));
        return redirect(aurl('users'));

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $UserId = User::find($id);
        $countries = Country::whereNull('parent')->get();/*
        return view(app('at').'.product.department.create',['title'=>trans('main.add'),'department'=>$department]);
  */
        return view('admin.users.create',compact('countries','UserId'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate(request(),
            [
                'address'=>'sometimes|nullable',
                'name'=>'required|min:6',
                'email'=>'required|email|unique:users,email,'.$id,
                'phone'=>'sometimes|nullable|numeric',
                'main_country_id'=>'sometimes|nullable|exists:countries,id',
                'country_id'=>'sometimes|nullable|exists:countries,id',
                'password' => 'sometimes|nullable',
                'company' => 'sometimes|nullable',

            ]);
        $data['password'] = bcrypt(request('password'));

        DB::table('users')->where('id', $id)
            ->update($data);
        /*        User::where('id', $id)->updated($data);*/
        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('users'));
    }




    public function check_parent(Request $request)
    {
        if($request->ajax())
        {
            if($request->has('parent') && $request->input('parent') > 0)
            {
                $dep = Country::where('parent','=',$request->input('parent'))->get();
                $data = view(app('at').'.users.sub',['department'=>$dep,'parent'=>$request->input('parent')])->render();
                if(!empty($data))
                {
                    return response()->json($data);
                }else{
                    return response()->json('false');
                }
            }
        }
    }


    public function allDelete(Request $request)
    {
        if(!empty($request->userId)){
            $delete =  User::whereIn('id', $request->userId);
            $delete->delete();
            session()->flash('success',trans('admin.deleted'));
            return back();
        }else{
            session()->flash('error','لم تختار اى عضو للحذف');
            return back();
        }
    }


}
