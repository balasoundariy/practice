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
        // session()->forget('orders');
        $orders = session()->has('orders')? session()->get('orders'): [];
        $order_data = [
            'ticket_amount' => $request->ticket_amount,
            'ticket_no' => json_encode($request->ticket_no),
            'chances' => json_encode($request->chances),
            'total' => $this->calculate_amount($request->ticket_amount ,$request->chances),
        ];
        if(isset($orders) && count($orders) > 0 && $this->is_value_present($orders,$request->ticket_amount)){
            $dat = $this->get_value_present($orders,$request->ticket_amount);
            Order::where('order_no',(string)$dat['order_no'])->update($order_data);
            $orders[(string)$dat['order_no']]['ticket_amount'] = $request->ticket_amount;
            $orders[(string)$dat['order_no']]['ticket_no'] = json_encode($request->ticket_no);
            $orders[(string)$dat['order_no']]['chances'] = json_encode($request->chances);
            $orders[(string)$dat['order_no']]['total'] = $this->calculate_amount($request->ticket_amount ,$request->chances);
        }else{
            $order_no = random_int(100000, 999999);
            $order_data['user_id'] = Auth::user()->id;
            $order_data['order_no'] = $order_no;
            $order_data['payment_status'] = 1;
            $order = Order::create($order_data);
            $orders = $orders+[$order_no => $order_data];
            session()->put('orders',$orders);
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

    public function get_value_present($arrayOfArrays, $value) {
        foreach ($arrayOfArrays as $array) {
            if (in_array($value, $array)) {
                return $array;
            }
        }
        return null;
    }

    public function is_value_present($arrayOfArrays, $value) {
        foreach ($arrayOfArrays as $array) {
            if (in_array($value, $array)) {
                return true;
            }
        }
        return false;
    }

    public function makePayment(Request $request)
    {
        //update payment status whether they have paid or not
        session()->forget('orders');
        return Response()->json([
            'status' => 200,
        ]);
    }
}
