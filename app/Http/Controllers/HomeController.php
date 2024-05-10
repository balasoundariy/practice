<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $user_type = Auth::user()->role;
            if($user_type == 'admin'){
                $user_count = User::where('role','!=','admin')->get()->count();
                $ticket_count = Ticket::all()->count();
                $order_count = Order::all()->count();
                $today_order_count = Order::whereDate('created_at', Carbon::today())->get()->count();
                $tickets = Order::with('user')->latest()->take(5)->get()->toArray();
                return view('admin.home',compact('tickets','user_count','ticket_count','order_count','today_order_count'));
            }else{
                $tickets = Order::where('user_id', Auth::id())->get()->toArray();
                return view('home',compact('tickets'));
            }
        }else{
            return view('home');
        }
    }
}
