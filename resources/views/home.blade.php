@extends('layout.layout')

@section('content')
    <div class="main_container">
        @auth()
{{--            <div class="card">--}}
{{--                <div class="img-container">--}}
{{--                    <div class="cart_status"> <img src="{{asset('/img/money.png')}}"  alt="cart"> </div>--}}
{{--                </div>--}}
{{--                <div class="card-content">--}}
{{--                    <h6> Please wait until 02:50 pm</h6>--}}
{{--                    <p class="excerpt">The ticket result will be announced after 02 hours 50 minutes</p>--}}
{{--                </div>--}}
{{--            </div>--}}
            <h1>History</h1>
            <br>
            @if(isset($tickets) && !empty($tickets))
                <div class="summaary_cart_con">
                    <div class="shoping_cart_head black_bg">
                        <div class="sc_name">Number</div>
                        <div class="sc_series"> Chance</div>
                        <div class="sc_amount"> Amount</div>
                    </div>
                    @foreach($tickets as $ticket)
                        @foreach(json_decode($ticket['ticket_no']) as $key => $number)
                            <div class="shoping_cart_head">
                                <div class="sc_name">{{$number}}</div>
                                <div class="sc_series"> {{json_decode($ticket['chances'])[$key]}}</div>
                                <div class="sc_amount"> {{$ticket['ticket_amount']}}</div>
                                <div class="sc_del"> <i class="fa fa-minus-circle delete_icon" aria-hidden="true"></i></div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
{{--                <div class="betting_container_rk">--}}
{{--                    <div class="betting_section head_sec">--}}
{{--                        <div class="bs_col_md_1"><p> Ticket </p></div>--}}
{{--                        <div class="bs_col_md_1"><p> Number</p></div>--}}
{{--                        <div class="bs_col_md_1"><p> Chance</p></div>--}}
{{--                    </div>--}}
{{--                    @foreach($tickets as $ticket)--}}
{{--                        @foreach(json_decode($ticket['ticket_no']) as $key => $number)--}}
{{--                            <div class="betting_section">--}}
{{--                                <div class="bs_col_md_1">{{$number}}</div>--}}
{{--                                <div class="bs_col_md_1"> {{json_decode($ticket['chances'])[$key]}}</div>--}}
{{--                                <div class="bs_col_md_1"> {{$ticket['ticket_amount']}}</div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    @endforeach--}}

{{--                </div>--}}
            @else
                <div class="mc_main_banner">
                    <img src="{{asset('/img/winner.png')}}" class="cart" alt="cart">
                </div>
                <h1 class="mc_sw_p"> Start Playing</h1>
                <p class="mc_p"> with your best emotions</p>
            @endif
            <button class="choose_btn">
                <a class="logout_clk" href="{{route('ticket')}}"> Buy ticket </a>
            </button>
        @else
            <div class="mc_main_banner">
                <img src="{{asset('/img/winner.png')}}" class="cart" alt="cart">
            </div>
            <h1 class="mc_sw_p"> Start Playing</h1>
            <p class="mc_p"> with your best emotions</p>
        @endauth
        <div class="hm_bottom_cont">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffde00" fill-opacity="1" d="M0,96L48,85.3C96,75,192,53,288,53.3C384,53,480,75,576,96C672,117,768,139,864,133.3C960,128,1056,96,1152,106.7C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </div>
    </div>
@endsection
