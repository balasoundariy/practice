<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function delete(Request $request)
    {
        $id = $request->id;
        Ticket::where('id',$id)->where('user_id',Auth::user()->id)->delete();
        return redirect()->route('show');
    }
}