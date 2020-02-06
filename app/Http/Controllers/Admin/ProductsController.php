<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Products ;
use App\Model\ProductsGallary ;
use App\Model\ProductsColor ;
use App\Model\ProductsSize ;
use App\Model\DepartmentProducts as Dep;
use Validator;
use Auth;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $allproducts = Products::orderBy('id','desc')->get();


        return view(app('at').'.product.products.index',['title'=>trans('admin.products'),'allproducts'=>$allproducts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Dep::where('parent','=',0)->pluck('ar_name','id');
        return view(app('at').'.product.products.create',['title'=>trans('admin.add'),'department'=>$department]);
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

            'ar_content' => 'required',
            'parent' => 'required',
            'price' => 'numeric',
            'stock' => 'required|numeric',


        ];
   $Validator   = Validator::make($request->all(),$rules);
        $Validator->SetAttributeNames ([
            'ar_name' => trans('admin.ar_name'),
            'ar_content' => trans('admin.ar_content'),
            'parent' => trans('admin.department'),
            'price' => trans('admin.price'),
            'stock' => trans('admin.stock'),

        ]);
        if($Validator->fails())
        {
            return back()->withInput()->withErrors($Validator);
        }else{
            $add = new Products;
            $path     = public_path().'/upload/products';


            $add->user_id             = admin()->user()->id;
            $add->user_type           = 'admin';
            if($request->has('parent') && $request->input('parent') !== null)
            {
            $add->dep_id              = $request->input('parent');
            $main_dep  = Dep::where('id','=',$request->input('parent'))->pluck('parent');
           foreach ($main_dep as $files)
           {
            $add->main_dep_id = $files;
           }
          }
            $add->ar_title            = $request->input('ar_name');
            $add->ar_content          = $request->input('ar_content');
            $add->price               = $request->input('price');
            $add->stock                = $request->input('stock');
            $add->save();

             $lastid = $add->id;

         //multiupload photos to table product_gallary
             if ($request->hasFile('media.*')) {
         $multifile     = $request->file('media');
          foreach ($multifile as $files)
           {
                $multiadd = new ProductsGallary;
                $fileName = str_random(5)."-".time()."-".str_random(3).".".$files->getClientOriginalExtension();
                if($files->move($path,$fileName))
                {
                    $multiadd->product_id = $lastid;
                    $multiadd->media = $fileName;
                    $multiadd->save();
                 }

           }
         }

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products  = Products::find($id);
        $department = Dep::where('parent','=',0)->pluck('ar_name','id');

        return view(app('at').'.product.products.edit',['title'=>trans('admin.edit'),'department'=>$department,'products'=>$products]);
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

            'ar_content' => 'required',
            'media.*' => 'image|mimes:gif,jpeg,jpg,png',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',


        ];
   $Validator   = Validator::make($request->all(),$rules);
        $Validator->SetAttributeNames ([
            'ar_name' => trans('admin.ar_name'),
            'ar_content' => trans('admin.ar_content'),
            'parent' => trans('admin.department'),
            'price' => trans('admin.price'),
            'stock' => trans('admin.stock'),
            'media.*' => trans('admin.media'),
        ]);
        if ($Validator->fails()) {
            return back()->withInput()->withErrors($Validator);
        } else {
            $update = Products::find($id);

            if($request->has('parent') && $request->input('parent') !== null)
            {
                   $update->dep_id              = $request->input('parent');
            $main_dep  = Dep::where('id','=',$request->input('parent'))->pluck('parent');
           foreach ($main_dep as $files)
           {
            $update->main_dep_id = $files;
           }


            }

            $update->ar_title            = $request->input('ar_name');
            $update->user_id             = admin()->user()->id;
            $update->user_type            = 'admin';
            $update->ar_content          = $request->input('ar_content');
            $update->price               = $request->input('price');
            $update->stock                = $request->input('stock');
            $update->save();
 $lastid = $update->id;
            /** update multiphotos in ProductsGallary table**/
            $path     = public_path().'/upload/products';
            $multifile     = $request->file('media');
            if($request->hasFile('media.*')) {
                foreach ($multifile as $files)
                {
                    $extension = $files->getClientOriginalExtension();
                    $fileName = str_random(5)."-".time()."-".str_random(3).".".$extension;
                    if($files->move($path,$fileName))
                    {
                        $multiupdate = new ProductsGallary;
                        $multiupdate->product_id = $id;
                        $multiupdate->media = $fileName;
                        $multiupdate->save();
                    }
                }

            }


            session()->flash('success', trans('admin.updated'));
        }
        return back();
    }

    /**
     * Remove the specified sub-image from posts_gallary.
     *

     */
    public function destroyimage($id) {
        $delete = ProductsGallary::find($id);
        if(!empty($delete->media) and file_exists(public_path().'/upload/products/'.$delete->media))
        {
            unlink(public_path().'/upload/products/'.$delete->media);
        }
        $delete->delete();
        session()->flash('success',trans('admin.deleted'));
        return back();
    }



    /**
     * Remove the specified sub-size from product_size.
     *

     */


    public function destroy($id)
    {
        $delete =  Products::find($id);

        $delete->delete();
               $affected = ProductsGallary::where('product_id', '=', $id)->get()->all();
                foreach ($affected as $affectedRows){
                    if (!empty($affectedRows->media) and file_exists(public_path() . '/upload/products/' . $affectedRows->media)) {
                        @unlink(public_path() . '/upload/products/' . $affectedRows->media);
                          $affectedRows->delete();
                    }
            }

        session()->flash('success',trans('admin.deleted'));
        return back();
    }



    public function allDelete(Request $request)
    {
        if(!empty($request->userId)){
            $delete =  Products::whereIn('id', $request->userId);
            $delete->delete();
            session()->flash('success',trans('admin.deleted'));
            return back();
        }else{
            session()->flash('error','لم تختار أي منتج للحذف');
            return back();
        }
    }



}
