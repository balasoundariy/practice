<?php

namespace App\Http\Controllers;

use App\Exports\OrderHistory;
use App\Models\Order;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function showList()
    {
        $tickets = Ticket::all()->toArray();
        return view('admin.show_ticket', compact('tickets'));
    }

    public function add()
    {
        return view('admin.add_ticket');
    }

    public function edit($ticket_id)
    {
        $ticket = Ticket::where('id',$ticket_id)->first();
        return view('admin.edit_ticket', compact('ticket'));
    }

    public function store(Request $request)
    {
        $ticket = new Ticket();
        $ticket->ticket_price = $request->ticket_price;
        $ticket->description = $request->description;
        $ticket->is_active = 1;
        $ticket->status = 1;
        $ticket->save();
        return redirect()->route('show');
    }

    public function update(Request $request)
    {
        $ticket = Ticket::find($request->id);
        $ticket->ticket_price = $request->ticket_price;
        $ticket->description = $request->description;
        $ticket->is_active = $request->is_active;
        $ticket->status = $request->status;
        $ticket->save();
        return redirect()->route('show');
    }

    public function delete($ticket_id)
    {
        Ticket::where('id',$ticket_id)->delete();
        return redirect()->route('show');
    }

    public function getOrdersHistory(Request $request)
    {
        if ($request->ajax()){
            if(isset($request->ticket_no) || isset($request->order_no)){
                $tickets = Order::with('user');
                $tickets = $tickets->when($request->filled('order_no'), function ($query) use ($request) {
                    $query->where('order_no', $request->order_no);
                });
                $tickets = $tickets->when($request->filled('ticket_no'), function ($query) use ($request) {
                    $query->whereJsonContains('ticket_no', $request->ticket_no);
                });
                $tickets = $tickets->get();
                return response()->json($tickets);
            }else{
                $tickets = [];
                return response()->json($tickets);
            }
        }else{
            return view('admin.orders_history');
        }
    }

    public function settlements()
    {
        return view('admin.settlements');
    }

    public function export(Request $request)
    {
        return Excel::download(new OrderHistory($request->input('ticket_no'),$request->input('order_no')), 'tickets_sold.xlsx');
    }
}
