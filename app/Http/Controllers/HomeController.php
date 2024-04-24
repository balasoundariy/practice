<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
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
                $tickets = Order::all()->toArray();
                return view('admin.home',compact('tickets'));
            }else{
                $tickets = Order::where('user_id', Auth::id())->get()->toArray();
                return view('home',compact('tickets'));
            }
        }else{
            return view('home');
        }
    }
}
