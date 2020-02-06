<?php


namespace App\Http\Controllers\Admin;

use App\Model\Category as Dep;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Up;


class CategoriesController extends Controller
{
    public function index()
    {
        $categories  = Category::all()->where('parent', '=', null);
        return view('admin.categories.index')
            ->with('categories', $categories);
    }


    public function create(Request $request)
    {
        $id = request('id');
        $CategoryId = Category::find($id);
        $categoryAll = Category::all()->where('parent', '=', null);
        return view('admin.categories.create')->with('categoryAll', $categoryAll);
    }

    public function store(Request $request)
    {

        /* 	 	 	 	created_at 	updated_at */
        $data = $this->validate(request(),
            [
                'category_ar_name' => 'required',
                'category_en_name' => 'required',
                'logo' => 'sometimes|nullable|' . v_image(),
                'parent' => 'sometimes|nullable|integer',
            ], [], [
                'Category_name_ar' => trans('admin.category_ar_name'),
                'Category_name_en' => trans('admin.category_ar_name'),
                'logo' => trans('admin.logo')
            ]);
        if (request()->hasFile('logo')) {

            $data['logo'] = Up::upload([
                // 'new_name'=>'',
                'file' => 'logo',
                'path' => 'countries',
                'upload_type' => 'single',
                /*                'delete_file' => sett()->logo,*/
            ]);
        }
        Category::create($data);
        session()->flash('success', trans('admin.add'));
        return redirect(aurl('categories'));

    }

    public function show($id)
    {
        $type = Category::all()->where('parent', '=', $id);
        return view('.admin.categories.type')->with('type', $type);
    }


    public function edit($id)
    {
        $CategoryId = Category::find($id);
        $CategoryAll = Category::all()->where('parent', '=', null);
        return view('admin.categories.create', compact('CategoryId'))->with('CategoryAll', $CategoryAll);
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate(request(),
            [
                'Category_name_ar' => 'required',
                'Category_name_en' => 'required',
                'mob' => 'required',
                'code' => 'required',
                'logo' => 'sometimes|nullable|' . v_image(),
            ], [], [
                'Category_name_ar' => trans('admin.Category_name_ar'),
                'Category_name_en' => trans('admin.Category_name_en'),
                'mob' => trans('admin.mob'),
                'code' => trans('admin.code'),
                'logo' => trans('admin.logo')
            ]);
        if (request()->hasFile('logo')) {

            $data['logo'] = up::upload([
                // 'new_name'=>'',
                'file' => 'logo',
                'path' => 'countries',
                'upload_type' => 'single',
                'delete_file' => Category::find($id)->logo,
            ]);
        }

        DB::table('countries')->where('id', $id)
            ->update($data);
        /*  Category::where('id', $id)->updated($data);*/
        session()->flash('success', trans('admin.update'));
        return redirect(aurl('countries'));
    }

    public function destroy($id)
    {
        //
    }


}
