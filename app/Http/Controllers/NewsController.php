<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\News;
use App\Model\Comment;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class NewsController extends Controller
{



    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function list(Request $request)
    {
        $news = News::with('city','country','news_gallary','comment.user')->get()->sortBy('sorting');
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Create a new Laravel collection from the array data
        $itemCollection = collect($news);

        // Define how many items we want to be visible in each page
        $perPage = 16;

        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

        // Create our paginator and pass it to the view
        $news= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

        // set url path for generated links
        $news->setPath($request->url());

        return view('front.news.list',compact('news'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $news = News::with('city','country','news_gallary','comment.user')->where('id',$id)->firstOrFail();
        return view('front.news.index',compact('news'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // Validation
       $this->rules['comment'] = 'required|max:400';
       $this->rules['news_id'] = 'required|exists:news,id';
       $data = $this->validate($request, $this->rules);
       //Create Adds
       $data['user_id'] = auth()->id();
       $products = Comment::create($data);
      //Success Message
       session()->flash('success', trans("admin.comment Successfully"));
       return redirect()->back();
    }



}
