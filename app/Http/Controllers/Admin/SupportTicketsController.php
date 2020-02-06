<?php


namespace App\Http\Controllers\Admin;

use App\Model\SupportTickets;
use App\Model\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SupportTicketsController extends Controller
{
    public function index()
    {
        $SupportTicketss = SupportTickets::all();
        return view('admin.tickets.index')
            ->with('SupportTicketss', $SupportTicketss);
    }




    public function status(Request $request, $id)
    {
        $order = SupportTickets::find($id);
        $order->level           = $request->input('level');
        $order->save();
        return back();
    }

    public function details($id)
    {
        $order = SupportTickets::find($id);
        $order->seen           = 1;
        $order->save();
        return view(app('at').'.tickets.details', ['ticket'=>$order ]);
    }


}
