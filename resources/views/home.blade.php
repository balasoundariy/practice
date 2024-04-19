@extends('layout.layout')

@section('content')
    <!-- @auth() -->
        <!-- <a class="logout_clk" href="{{route('logout')}}"> Logout </a>
        <a class="logout_clk" href="{{route('ticket')}}"> Choose ticket </a> -->

<div class="main_container">
    
<div class="mc_main_banner"> <img src="/img/winner.png" class="cart" alt="cart"> </div>

<h1 class="mc_sw_p"> Start Playing</h2>
<p class="mc_p"> with your best emotions</p>

<button class="choose_btn">  choose ticket </button>

<div> </div>

</div>


    <!-- @else
        <button class="register_clk" > Register </button>
        <button class="login_clk" > Login </button>
    @endauth -->
@endsection
