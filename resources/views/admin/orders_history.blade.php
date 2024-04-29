@extends('layout.layout')

@section('content')
    <div class="payment_sec_head">
        <a class="icon_arr" onclick="window.history.back();"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> </a>
        <h1 class="payment_h1">Orders</h1>
    </div>
    <div class="main_container admin_panel_edittic" style="padding-top: 0px">
        @auth()
            @if(isset($tickets) && !empty($tickets))
                <div class="accordion order_hs_sec">
                    @foreach($tickets as $ticket)
                        @foreach(json_decode($ticket['ticket_no']) as $key => $number)
                            <div class="at-item">
                        <div class="at-title active">
                            <div class="order_hs_innersec">
                                <p class="oh_ticknumber" > <label> Ticket No : </label> {{$number}}</p>
                                <p class="status cancel">Pending</p>
                            </div>
                        </div>
                        <div class="at-tab" style="display: block;">
                            <div class="acc_or_con">
                                <div class="acc_col_4">
                                    <label> User </label>
                                    <span>541225</span>
                                </div>
                                <div class="acc_col_4">
                                    <label> Chance</label>
                                    <span>{{json_decode($ticket['chances'])[$key]}}</span>
                                </div>
                                <div class="acc_col_4">
                                    <label> Amount</label>
                                    <span>{{$ticket['ticket_amount']}}</span>
                                </div>
                                <div class="acc_col_4">
                                    <label> date</label>
                                    <span>{{$ticket['created_at']}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
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

</script>

@endsection
