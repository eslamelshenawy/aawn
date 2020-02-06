<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\News;
use App\User;
use App\Model\Agent;
use App\Model\Products;
use App\Model\Visitor;
use App\Model\ContactUs;
use App\Model\DepartmentProducts;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_ip = getUserIP();
        $created = date("Y-m-d");
        $visitor = Visitor::where('ip', $user_ip)->where('created',$created)->first();
        if(is_null($visitor)){
            Visitor::create(['ip' => $user_ip,'created' => $created]);
        }
        User::where('id',auth()->id())->update(['ip' => getUserIP()]);
        $products   = Products::with('products_gallary')->orderBy('id','desc')->where('stock','>','0')->where('type','1')->limit(6)->get()->sortByDesc('sorting');
        $orders     = Products::with('products_gallary')->orderBy('id','desc')->where('stock','>','0')->where('type','2')->limit(6)->get()->sortByDesc('sorting');
        $categories = DepartmentProducts::with('department.products_dep.products_gallary')->with(['department.products_dep' => function($query){
            $query->orderBy('id','desc')->where('stock','>','0')->get()->sortBy('sorting');
        }])->where('parent','0')->get();
        $news       = News::with('news_gallary')->orderBy('id','desc')->limit(3)->get()->sortBy('sorting');
        return view('front.index',compact('products','categories','news','orders'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('front.about');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function agent(Request $request)
    {
        if(filled(request()->city)){
            $agents = Agent::with('agent_country','agent_main_country')->where('country_id',request()->city)->get()->sortBy('sorting');
        }else {
            $agents = Agent::with('agent_country','agent_main_country')->get()->sortBy('sorting');
        }
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Create a new Laravel collection from the array data
        $itemCollection = collect($agents);

        // Define how many items we want to be visible in each page
        $perPage = 20;

        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

        // Create our paginator and pass it to the view
        $agents= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

        // set url path for generated links
        $agents->setPath($request->url());
        return view('front.agent',compact('agents'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('front.contact');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        //Validation
        $data = $this->validate($request,[
            'name' => 'required|max:150',
            'email' => 'required|max:150',
            'subject' => 'required|max:150',
            'message' => 'required',
        ]);
        ContactUs::create($data);
        session()->flash('success', trans("admin.sent Successfully"));
        return redirect()->back();
    }
}
