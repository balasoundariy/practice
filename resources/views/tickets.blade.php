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
                    <a href="{{route('ticket_details',$ticket->ticket_price)}}">
                        <div class="top --flex-column">
                            <div class="money_icon">  <img src="{{asset('/img/money.png')}}" class="cart" alt="cart"> </div>
                            <div class="ticket_select1">
                                <p class="tic_container_p" ><i class="fa fa-inr" aria-hidden="true"></i>{{$ticket->ticket_price}} </p>
                            </div>
                        </div>
                        <div class="rip"></div>
                        <div class="bottom --flex-row-j!sb">
                           Buy now
                        </div>
                    </a>
                </widget>
            @endforeach
        </div>
    </div>
    <div class="hm_bottom_cont">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffde00" fill-opacity="1" d="M0,96L48,85.3C96,75,192,53,288,53.3C384,53,480,75,576,96C672,117,768,139,864,133.3C960,128,1056,96,1152,106.7C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </div>
@endsection
