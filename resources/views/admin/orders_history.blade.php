@extends('layout.layout')

@section('content')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>

    <div class="payment_sec_head">
        <a class="icon_arr" onclick="window.history.back();"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> </a>
        <h1 class="payment_h1">Orders</h1>
    </div>
<div class="order_his_filter_sec"> 
    <div class="ohf_div">
<input type="text" id="datepicker" placeholder="Select Date">
</div>
<div class="ohf_div">
<input type="text"  placeholder="Enter UserName">
</div>
<div class="exp_con">
<button class="export_btn" onclick="export_myFunction()"> Export </button>
<div class="dropdown-content" id="exp_myDropdown">
                <a href="#">PDF</a>
                <a href="#">XlS</a>
                <a href="#">CSV</a>
            </div>
</div>
</div>

    <div class="main_container admin_panel_edittic" style="padding-top: 0px">
        @auth()
            @if(isset($tickets) && !empty($tickets))
                @php
                    $count = 1;
                @endphp
                <div class="accordion order_hs_sec">
                    @foreach($tickets as $ticket)
                        @foreach(json_decode($ticket->ticket_no) as $key => $number)
                            <div class="at-item">
                                <div class="at-title @if($count == 1)active @endif">
                                    <div class="order_hs_innersec">
                                        <p class="oh_ticknumber" > <label> Ticket No : </label> {{$number}}</p>
                                        <p class="status cancel">Pending</p>
                                    </div>
                                </div>
                                <div class="at-tab" @if($count == 1)style="display: block;" @endif>
                                    <div class="acc_or_con">
                                        <div class="acc_col_4 ord_his_acc_rk">
                                            <label> User </label>
                                            <span>{{$ticket->user->name}}</span>
                                        </div>
                                        <div class="acc_col_4 ord_his_acc_rk">
                                            <label> Chance</label>
                                            <span>{{json_decode($ticket->chances)[$key]}}</span>
                                        </div>
                                        <div class="acc_col_4 ord_his_acc_rk">
                                            <label> Ticket Amount</label>
                                            <span>{{$ticket->ticket_amount}}</span>
                                        </div>
                                        <div class="acc_col_4 ord_his_acc_rk">
                                            <label> date</label>
                                            <span>{{date('d-m-Y', strtotime($ticket->created_at))}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </div>
            @else
                <h1>No data found</h1>
            @endif
        @else

        @endauth
        <div class="hm_bottom_cont">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffde00" fill-opacity="1" d="M0,96L48,85.3C96,75,192,53,288,53.3C384,53,480,75,576,96C672,117,768,139,864,133.3C960,128,1056,96,1152,106.7C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $( "#datepicker" ).datepicker();

        $(".at-title").click(function () {
            $(this)
                .toggleClass("active")
                .next(".at-tab")
                .slideToggle()
                .parent()
                .siblings()
                .find(".at-tab")
                .slideUp()
                .prev()
                .removeClass("active");
        });
    });
    function export_myFunction() {
    
        document.getElementById("exp_myDropdown").classList.toggle("show");
    }
</script>

@endsection
