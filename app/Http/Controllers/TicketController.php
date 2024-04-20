<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function showTickets()
    {
        return view('tickets');
    }

    public function ticketDetails($price)
    {
        return view('ticket_details', compact('price'));
    }

    public function summary(Request $request)
    {
        $tickets = new Ticket();
        $tickets->ticket_amount = $request->ticket_amount;
        $tickets->ticket_no = json_encode($request->ticket_no);
        $tickets->chances = json_encode($request->chances);
        $tickets->total = 1234;
        $tickets->save();
        return view('summary',compact('tickets'));
    }

    public function makePayment(Request $request)
    {
        //update payment status whether they have paid or not
        return Response()->json([
            'status' => 200,
        ]);
    }
}
