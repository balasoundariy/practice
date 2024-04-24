@extends('layout.layout')

@section('content')
    <form action="{{route('update')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$ticket['id']}}">
        <div class="tic_details_con">
            <div class="col_md_8">
                <p class="ticdet_p">Ticket price</p>
                <input type="text" inputmode="numeric" name="ticket_price" value="{{$ticket['ticket_price']}}">
            </div>
            <div class="col_md_2">
                <p class="ticdet_p">Description</p>
                <input type="text" name="description" value="{{$ticket['description']}}">
            </div>
            <div class="col_md_1">
                <p class="ticdet_p">Status</p>
                <input type="text" inputmode="numeric" name="status" value="{{$ticket['status']}}">
            </div>
        </div>
        <div class="td_btn_con next_btn">
            <button class="td_btn" type="submit">next</button>
        </div>
    </form>
    <div class="hm_bottom_cont">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffde00" fill-opacity="1" d="M0,96L48,85.3C96,75,192,53,288,53.3C384,53,480,75,576,96C672,117,768,139,864,133.3C960,128,1056,96,1152,106.7C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </div>
@endsection