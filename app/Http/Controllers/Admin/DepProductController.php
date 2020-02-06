<?php



namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use up;
use Validator;
use App\Model\DepartmentProducts as Dep;

class DepProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('department') and is_numeric($request->input('department')))
        {
            $alldep = Dep::where('parent','=',$request->input('department'))->orderBy('id','desc')->paginate(10);
            if($request->input('department') > 0)
            {
                $master = Dep::find($request->input('department'));
                $href = '<a href="'.url(app('aurl').'/department_product?department='.$master->parent).'">'.$master->en_name.'</a>';
            }else{
                $href = '';
            }
        }else{
            $alldep = Dep::where('parent','=',0)->orderBy('id','desc')->paginate(10);
            $href = '';
        }
        return view(app('at').'.product.department.index',
            ['title'=>trans('admin.department_product'),
                'alldep'=>$alldep,
                'master'=>$href,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $department = Dep::where('parent','=',0)->pluck('ar_name','id')->all();/*
        return view(app('at').'.product.department.create',['title'=>trans('main.add'),'department'=>$department]);
  */
        return view('admin.product.department.create')->with('department',$department);
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
            'image' => 'required|image',
        ];

        $Validator   = Validator::make($request->all(),$rules);
        $Validator->SetAttributeNames ([
            'ar_name' => trans('admin.ar_name'),
            'image' => trans('admin.image'),
        ]);
        if($Validator->fails())
        {
            return back()->withInput()->withErrors($Validator);
        }else{
            $add = new Dep;
            $file     = $request->file('image');
            $path     = public_path().'/upload/products';
            $filename = time().rand(11111,00000).'.'.$file->getClientOriginalExtension();
            if($file->move($path,$filename))
            {
                $add->image = $filename;
            }
            if($request->has('parent') && $request->input('parent') !== null)
            {
                $add->parent = $request->input('parent');
            }else{
                $add->parent = 0;
            }
         $add->ar_name           = $request->input('ar_name');
        
         $add->save();
          session()->flash('success',trans('admin.added'));
        }
        return back();
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
        $department = Dep::where('parent','=',0)->pluck('ar_name','id');
        return view(app('at').'.product.department.edit',['title'=>trans('admin.edit'),
            'department'=>$department,
            'edit'=>$dep,
        ]);
    }

    public function check_parent(Request $request)
    {
        if($request->ajax())
        {
            if($request->has('parent') && $request->input('parent') > 0)
            {
                $dep = Dep::where('parent','=',$request->input('parent'))->get();
                $data = view(app('at').'.product.department.sub',['department'=>$dep,'parent'=>$request->input('parent')])->render();
                if(!empty($data))
                {
                    return response()->json($data);
                }else{
                    return response()->json('false');
                }
            }
        }
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
            $update =  Dep::find($id);
               if ($request->hasFile('image')) {
                @unlink(public_path() . '/upload/products/' . $update->image);
                $file = $request->file('image');
                $path = public_path() . '/upload/products';
                $filename = time() . rand(11111, 00000) . '.' . $file->getClientOriginalExtension();
                if ($file->move($path, $filename)) {
                    $update->image = $filename;
                }
            }
            if($request->has('parent') && $request->input('parent') !== null)
            {
                $update->parent = $request->input('parent');
            }
            
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
    public static function DeleteParent($id)
    {
        $getparent = Dep::where('parent','=',$id)->get();
        foreach($getparent as $parent)
        {
            $check = Dep::find($parent->id);

            if($check->parent > 0)
            {
                self::DeleteParent($check->id);
                $check->delete();
            }else{
                $check->delete();
            }

        }
    }
    public function destroy($id)
    {
    $delete =  Dep::find($id);
        if(!empty($delete->image) and file_exists(public_path().'/upload/products/'.$delete->image))
        {
            unlink(public_path().'/upload/products/'.$delete->image);
        }
        Dep::find($id)->delete();
        self::DeleteParent($id);
        session()->flash('success',trans('admin.deleted'));
        return back();
    }
}
