@extends('layout.layout')

@section('content')
    <div class="main_container">
        <div class="mc_main_banner">
            <img src="{{asset('/img/winner.png')}}" class="cart" alt="cart">
        </div>
        <h1 class="mc_sw_p"> Start Playing</h1>
        <p class="mc_p"> with your best emotions</p>
        @auth()
            <button class="choose_btn">
                <a class="logout_clk" href="{{route('ticket')}}"> Choose ticket </a>
            </button>
        @else

        @endauth
{{--        <div class="lottery_succes">--}}
{{--            <p> lottery_succes</p>--}}
{{--        </div>--}}
    </div>
@endsection
