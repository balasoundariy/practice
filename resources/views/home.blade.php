@extends('layout.layout')

@section('content')
    @auth()
        <a class="logout_clk" href="{{route('logout')}}"> Logout </a>
        <a class="logout_clk" href="{{route('ticket')}}"> Choose ticket </a>
    @else
        <button class="register_clk" > Register </button>
        <button class="login_clk" > Login </button>
    @endauth
@endsection
