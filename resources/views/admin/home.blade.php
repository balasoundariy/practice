@extends('layout.layout')

@section('content')
    <div class="main_container">
        @auth()
            <div class="tic_con_rk">
                <div class="wid_50">
                    <p class="home_tic_lbl"> Total Orders</p>
                    <p class="home_tic_det">{{$order_count}} </p>
                </div>
                <div class="wid_50">
                    <p class="home_tic_lbl"> Today Orders</p>
                    <p class="home_tic_det">{{$today_order_count}} </p>
                </div>
                <div class="wid_50">
                    <p class="home_tic_lbl">Total Tickets</p>
                    <p class="home_tic_det" >{{$ticket_count}} </p>
                </div>
                <div class="wid_50">
                    <p class="home_tic_lbl"> Total Users</p>
                    <p class="home_tic_det">{{$user_count}} </p>
                </div>
            </div>
            <p class="recent_orders"> Recent Orders </p>
            @if(isset($tickets) && !empty($tickets))
                <div class="summaary_cart_con">
                    <div class="shoping_cart_head black_bg">
                        <div class="sc_amount"> User</div>
                        <div class="sc_name">Number choosed</div>
                        <div class="sc_series"> Chance</div>
                        <div class="sc_amount"> Amount</div>
                    </div>
                    @foreach($tickets as $ticket)
                        @foreach(json_decode($ticket['ticket_no']) as $key => $number)
                            <div class="shoping_cart_head">
                                <div class="sc_del"> {{$ticket['user']['name']}}</div>
                                <div class="sc_name">{{$number}}</div>
                                <div class="sc_series"> {{json_decode($ticket['chances'])[$key]}}</div>
                                <div class="sc_amount"> {{$ticket['ticket_amount']}}</div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            @else
                <div class="or_hs_no_home">
                    <span>No recent orders</span>
                </div>
            @endif
        @else

        @endauth
        <div class="hm_bottom_cont">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffde00" fill-opacity="1" d="M0,96L48,85.3C96,75,192,53,288,53.3C384,53,480,75,576,96C672,117,768,139,864,133.3C960,128,1056,96,1152,106.7C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </div>
    </div>
@endsection
