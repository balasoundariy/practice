@extends('layout.layout')

@section('content')
    <style>
        body
        {
            background-color:#ffe000;
        }
    </style>
    <div class="main_container tc_main_con">
        <div class="payment_sec_head">
            <a class="icon_arr" onclick="window.history.back();"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> </a>
            <h1 class="payment_h1">Ticket Amount</h1>
        </div>
        <div class="tic_container">
            @foreach($tickets as $ticket)
                <widget type="ticket" class="--flex-column">
                    <a @if($ticket->is_active)href="{{route('ticket_details',$ticket->ticket_price)}}" @endif>
                        <div class="top --flex-column">
                            <div class="money_icon">  <img src="{{asset('/img/money.png')}}" class="cart" alt="cart"> </div>
                            <div class="ticket_select1">
                                <p class="tic_container_p" ><i class="fa fa-inr" aria-hidden="true"></i>{{$ticket->ticket_price}} </p>
                            </div>
                        </div>
                        <div class="rip"></div>
                        <div class="bottom --flex-row-j!sb">
                            @if($ticket->is_active)
                                Buy now
                            @else
                                Closed
                            @endif
                        </div>
                    </a>
                </widget>
            @endforeach
        </div>
    </div>
@endsection
