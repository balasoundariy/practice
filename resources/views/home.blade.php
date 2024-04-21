@extends('layout.layout')

@section('content')
    <div class="main_container">
        <div class="mc_main_banner">
            <img src="{{asset('/img/winner.png')}}" class="cart" alt="cart">
        </div>
        <h1 class="mc_sw_p"> Start Playing</h1>
        <p class="mc_p"> with your best emotions</p>
        @auth()

        <div class="betting_container_rk">
            <div class="betting_section head_sec">

            <div class="bs_col_md_1"><p> bet </p></div>
            <div class="bs_col_md_1"><p> amount</p> </p></div>
            <div class="bs_col_md_1"><p> chance</p></div>
            
           </div>
           <div class="betting_section">
           <div class="bs_col_md_1"><p> 1221111111111</p></div>
            <div class="bs_col_md_1"><p> 122</p> </p></div>
            <div class="bs_col_md_1"><p> 122</p></div>
            </div>

        </div>

            <button class="choose_btn">
                <a class="logout_clk" href="{{route('ticket')}}"> Choose ticket </a>
            </button>
        @else

        @endauth

        <div class="hm_bottom_cont">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffde00" fill-opacity="1" d="M0,96L48,85.3C96,75,192,53,288,53.3C384,53,480,75,576,96C672,117,768,139,864,133.3C960,128,1056,96,1152,106.7C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </div>

{{--        <div class="lottery_succes">--}}
{{--            <p> lottery_succes</p>--}}
{{--        </div>--}}
    </div>
@endsection
