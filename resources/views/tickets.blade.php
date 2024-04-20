@extends('layout.layout')

@section('content')
    <div class="main_container tc_main_con">
        <h1 class="tc_h1">Ticket Amount</h1>
        <div class="tic_container">
            <div class="ticket_select">
                <a class="tic_container_p" href="{{route('ticket_details',30)}}"><i class="fa fa-inr" aria-hidden="true"></i>30 </a>
            </div>
            <div class="ticket_select">
                <a class="tic_container_p" href="{{route('ticket_details',60)}}"><i class="fa fa-inr" aria-hidden="true"></i>60 </a>
            </div>
            <div class="ticket_select">
                <a class="tic_container_p" href="{{route('ticket_details',90)}}"><i class="fa fa-inr" aria-hidden="true"></i>90 </a>
            </div>
            <div class="ticket_select">
                <a class="tic_container_p" href="{{route('ticket_details',120)}}"><i class="fa fa-inr" aria-hidden="true"></i>120 </a>
            </div>
            <div class="ticket_select">
                <a class="tic_container_p" href="{{route('ticket_details',150)}}"><i class="fa fa-inr" aria-hidden="true"></i>150 </a>
            </div>
        </div>
    </div>
@endsection
