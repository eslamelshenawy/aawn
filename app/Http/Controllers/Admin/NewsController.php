<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\News;
use App\Model\NewsGallary;
use App\Model\Country;
use App\Model\Comment;

use App\Model\DepartmentNews as Dep;
use Validator;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $allneews = News::orderBy('id','desc')->paginate(10);

     return view(app('at').'.news.news.index',['title'=>trans('admin.news'),'allneews'=>$allneews]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     $countries   = Country::whereNull('parent')->get();
     return view(app('at').'.news.news.create',['title'=>trans('admin.add'),'countries' => $countries]);
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
            'country_id' => 'required|exists:countries,id',
            'main_country_id'=>'required|exists:countries,id',
            'date' => 'required|date|after_or_equal:today',
            'address' => 'required|max:400',
            'media*' => 'image|mimes:gif,jpeg,jpg,png',

        ];

        $Validator   = Validator::make($request->all(),$rules);
        $Validator->SetAttributeNames ([
            'ar_name' => trans('admin.ar_name'),
            'ar_content' => trans('admin.ar_content'),
            'media' => trans('admin.media'),

        ]);
        if($Validator->fails())
        {
            return back()->withInput()->withErrors($Validator);
        }else{
              $add = new News;
              $file     = $request->file('photo');
              $path     = public_path().'/upload/products';

            $add->user_id             = admin()->user()->id;
            $add->ar_title             = $request->input('ar_name');
            $add->ar_content          = $request->input('ar_content');
            $add->country_id          = $request->input('country_id');
            $add->main_country_id          = $request->input('main_country_id');
            $add->date          = $request->input('date');
            $add->address          = $request->input('address');
            $add->save();
            $lastid = $add->id;

            //multiupload photos to table product_gallary
            if ($request->hasFile('media.*')) {
                $multifile     = $request->file('media');
                foreach ($multifile as $files)
                {
                    $multiadd = new NewsGallary;
                    $fileName = str_random(5)."-".time()."-".str_random(3).".".$files->getClientOriginalExtension();
                    if($files->move($path,$fileName))
                    {
                        $multiadd->news_id = $lastid;
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
      $alldep = Dep::pluck('en_name','id');
      $posts   = News::find($id);
     return view(app('at').'.news.news.edit',['title'=>trans('admin.edit'),'alldep'=>$alldep,'posts'=>$posts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * Update the specified resource in storage.

     */
    public function update(Request $request, $id)
    {
        $rules = [
            'ar_name' => 'required',
            'ar_content' => 'required',

        ];

        $Validator   = Validator::make($request->all(),$rules);
        $Validator->SetAttributeNames ([
            'ar_name' => trans('admin.ar_name'),
            'ar_content' => trans('admin.ar_content'),
            'media' => trans('admin.media'),
        ]);
        if($Validator->fails())
        {
            return back()->withInput()->withErrors($Validator);
        }else{
              $update =  News::find($id);

            $update->ar_title              = $request->input('ar_name');
            $update->ar_content           = $request->input('ar_content');
            $update->save();

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
                        $multiupdate = new NewsGallary();
                        $multiupdate->news_id = $id;
                        $multiupdate->media = $fileName;
                        $multiupdate->save();
                    }
                }

            }

            session()->flash('success',trans('admin.updated'));
        }
        return back();
    }





    /**
     * Remove the specified sub-image from posts_gallary.
     *

     */
    public function destroyimage($id) {
        $delete = NewsGallary::find($id);
        if(!empty($delete->media) and file_exists(public_path().'/upload/products/'.$delete->media))
        {
            unlink(public_path().'/upload/products/'.$delete->media);
        }
        $delete->delete();
        session()->flash('success',trans('admin.deleted'));
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
        $delete =  News::find($id);

        $delete->delete();
        $affected = NewsGallary::where('product_id', '=', $id)->get()->all();
        foreach ($affected as $affectedRows){
            if (!empty($affectedRows->media) and file_exists(public_path() . '/upload/products/' . $affectedRows->media)) {
                @unlink(public_path() . '/upload/products/' . $affectedRows->media);
                $affectedRows->delete();
            }
        }

        session()->flash('success',trans('admin.deleted'));
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comments($id)
    {
      $comments   = Comment::with('user')->where('news_id',$id)->orderBy('id','desc')->get();
     return view(app('at').'.news.comments.index',['title'=>trans('admin.edit'),'comments'=>$comments]);
    }



        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function deleteComment($id)
        {
            $delete =  Comment::findOrFail($id);
            $delete->delete();
            session()->flash('success',trans('admin.deleted'));
            return back();
        }


}
