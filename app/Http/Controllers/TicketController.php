<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
{
    public function showTickets()
    {
        $tickets = Ticket::all();
        return view('tickets', compact('tickets'));
    }

    public function ticketDetails($price)
    {
        return view('ticket_details', compact('price'));
    }

    public function summary(Request $request)
    {
        $order_id = session()->has('order_id')? session()->get('order_id'): false;
        if($order_id){
            $orders = Order::find($order_id);
            $orders->ticket_amount = $request->ticket_amount;
            $orders->ticket_no = json_encode($request->ticket_no);
            $orders->chances = json_encode($request->chances);
            $orders->total = $this->calculate_amount($request->ticket_amount ,$request->chances);
            $orders->save();
        }else{
            $orders = new Order();
            $orders->user_id = Auth::user()->id;
            $orders->ticket_amount = $request->ticket_amount;
            $orders->ticket_no = json_encode($request->ticket_no);
            $orders->chances = json_encode($request->chances);
            $orders->total = $this->calculate_amount($request->ticket_amount ,$request->chances);
            $orders->payment_status = 1;
            $orders->save();
            session()->put('order_id',$orders->id);
        }
        return view('summary',['tickets' => $orders]);
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
        session()->forget('order_id');
        return Response()->json([
            'status' => 200,
        ]);
    }
}
