<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        $ticket_id = session()->has('ticket_id')? session()->get('ticket_id'): false;
        if($ticket_id){
            $tickets = Ticket::find($ticket_id);
            $tickets->ticket_amount = $request->ticket_amount;
            $tickets->ticket_no = json_encode($request->ticket_no);
            $tickets->chances = json_encode($request->chances);
            $tickets->total = $this->calculate_amount($request->ticket_amount ,$request->chances);
            $tickets->save();
        }else{
            $tickets = new Ticket();
            $tickets->user_id = Auth::user()->id;
            $tickets->ticket_amount = $request->ticket_amount;
            $tickets->ticket_no = json_encode($request->ticket_no);
            $tickets->chances = json_encode($request->chances);
            $tickets->total = $this->calculate_amount($request->ticket_amount ,$request->chances);
            $tickets->payment_status = 1;
            $tickets->save();
            session()->put('ticket_id',$tickets->id);
        }
        return view('summary',compact('tickets'));
    }

    public function calculate_amount($t_amount,$chances)
    {
        $amount = 0;
        foreach ($chances as $chance) {
            $amount = $amount + ($t_amount * $chance);
        }
        return $amount;
    }

    public function makePayment(Request $request)
    {
        //update payment status whether they have paid or not
        session()->forget('ticket_id');
        return Response()->json([
            'status' => 200,
        ]);
    }
}
