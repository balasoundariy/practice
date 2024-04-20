@extends('layout.layout')

@section('content')
    <div class="main_container tc_main_con">
        <h1 class="tc_h1">Ticket Amount</h1>
        <div class="tic_container">
            @foreach(config('app.tickets') as $ticket)
                <div class="ticket_select">
                    <a class="tic_container_p" href="{{route('ticket_details',$ticket)}}"><i class="fa fa-inr" aria-hidden="true"></i>{{$ticket}} </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
