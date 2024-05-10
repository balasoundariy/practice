<?php

namespace App\Http\Controllers;

use App\Exports\OrderHistory;
use App\Models\Order;
use App\Models\Ticket;
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
        $ticket->status = 1;
        $ticket->save();
        return redirect()->route('show');
    }

    public function update(Request $request)
    {
        $ticket = Ticket::find($request->id);
        $ticket->ticket_price = $request->ticket_price;
        $ticket->description = $request->description;
        $ticket->status = $request->status;
        $ticket->save();
        return redirect()->route('show');
    }

    public function delete($ticket_id)
    {
        Ticket::where('id',$ticket_id)->delete();
        return redirect()->route('show');
    }

    public function getOrdersHistory()
    {
        $tickets = Order::with('user')->get();
        return view('admin.orders_history', compact('tickets'));
    }

    public function export($type)
    {
        if($type == 'excel'){
            return Excel::download(new OrderHistory(), 'tickets_purchased.xlsx');
        }
    }
}
