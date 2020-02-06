<?php


namespace App\Http\Controllers\Admin;

use App\Model\Country;
use App\Model\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Up;


class CountriesController extends Controller
{
    public function index()
    {
        $countries = Country::all()->where('parent', '=', null);
        return view('admin.countries.index')
            ->with('countries', $countries);
    }


    public function create(Request $request)
    {
        $id = request('id');
        $countryId = Country::find($id);
        $countryAll = Country::all()->where('parent', '=', null);
        return view('admin.countries.create')->with('countryAll', $countryAll);
    }

    public function store(Request $request)
    {
        $data = $this->validate(request(),
            [
                'country_name_ar' => 'required',

                'code' => 'sometimes|nullable',
                'parent' => 'sometimes|nullable|integer',
            ], [], [
                'country_name_ar' => trans('admin.country_name_ar'),
                'code' => trans('admin.code'),
                'logo' => trans('admin.logo')
            ]);

        Country::create($data);
        session()->flash('success', trans('admin.add'));
        return redirect(aurl('countries'));

    }

    public function show($id)
    {
        $cities = Country::all()->where('parent', '=', $id);
        return view('.admin.countries.cities')->with('cities', $cities);
    }



    public function city_agents($id)
    {
        $cities = Country::where('id', '=', $id)->first();
        $agents = Agent::all()->where('country_id', '=', $id);
        return view('.admin.agents.city_agents')->with('agents', $agents)->with('city', $cities);
    }



    public function edit($id)
    {
        $countryId = Country::find($id);
        $countryAll = Country::all()->where('parent', '=', null);
        return view('admin.countries.create', compact('countryId'))->with('countryAll', $countryAll);
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate(request(),
            [
                'country_name_ar' => 'required',
                'code' => 'sometimes|nullable',

            ], [], [
                'country_name_ar' => trans('admin.country_name_ar'),
                'code' => trans('admin.code'),
                'logo' => trans('admin.logo'),
            ]);


        DB::table('countries')->where('id', $id)
            ->update($data);
        /*  Country::where('id', $id)->updated($data);*/
        session()->flash('success', trans('admin.updated'));
        return redirect(aurl('countries'));
    }







    public function destroy($id)
    {

        Country::find($id)->delete();
        DB::table('countries')->where('parent', $id)
            ->delete();
        session()->flash('success',trans('admin.deleted'));
        return back();
    }


}
