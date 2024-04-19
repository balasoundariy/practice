<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function showTickets()
    {
        return view('tickets');
    }

    public function ticketDetails()
    {
        return view('ticket_details');
    }

    public function summary()
    {
        return view('summary');
    }
}
