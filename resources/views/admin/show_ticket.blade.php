@extends('layout.layout')

@section('content')
    <div class="payment_sec_head">
        <a class="icon_arr" onclick="window.history.back();"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> </a>
        <h1 class="payment_h1">Ticket</h1>
    </div>
    <div class="main_container admin_panel_pt" style="padding-top: 0px">

        <div class="create_tic_btn">
            <a   href="{{route('add')}}">create ticket <i class="fa fa-plus" aria-hidden="true"></i></a>
        </div>


        @if(isset($tickets) && !empty($tickets))
            <div class="summaary_cart_con">
                <div class="shoping_cart_head black_bg">
                    <div class="sc_name">Ticket Price</div>
                    <div class="sc_series"> Description</div>
                    <div class="sc_amount"> Status</div>
                    <div class="sc_del"> Action</div>
                </div>
                @foreach($tickets as $ticket)
                        <div class="shoping_cart_head">
                            <div class="sc_name">{{$ticket['ticket_price']}}</div>
                            <div class="sc_series"> {{$ticket['description']}}</div>
                            <div class="sc_amount"> {{$ticket['status']}}</div>
                            <div class="sc_del"><a style="padding-right: 15px" href="{{route('edit',$ticket['id'])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                            <a href="{{route('delete',$ticket['id'])}}"> <i class="fa fa-trash-o del_icon" aria-hidden="true"></i></a></div>
                        </div>
                @endforeach
            </div>
        @else
            <div class="or_hs_no">
                <span>No tickets found</span>
            </div>
        @endif
        <div class="hm_bottom_cont">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffde00" fill-opacity="1" d="M0,96L48,85.3C96,75,192,53,288,53.3C384,53,480,75,576,96C672,117,768,139,864,133.3C960,128,1056,96,1152,106.7C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </div>
    </div>
@endsection
