<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $tickets = Ticket::where('user_id', Auth::id())->get()->toArray();
//            dd($tickets);
            return view('home',compact('tickets'));
        }else{

            return view('home');
        }
    }
}
