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
{{--            <input type="text" id="datepicker" placeholder="Select Date">--}}
            <input type="text"  placeholder="Enter order no" id="order_no">
        </div>
        <div class="ohf_div">
            <input type="text"  placeholder="Enter ticket no" id="ticket_no">
        </div>
        <div class="exp_con">
            <button class="export_btn" onclick="export_myFunction()"> Export </button>
            <div class="dropdown-content" id="exp_myDropdown">
                <a id="exportBtn">Excel</a>
            </div>
        </div>
    </div>
    <div class="main_container admin_panel_edittic" style="padding-top: 0px">
        @auth()
            <div class="accordion order_hs_sec">
                <div class="or_hs_no">
                    <img src="{{asset('/img/search.png')}}" class="cart" alt="cart">
                    <span>Search By Ticket No.</span>
                </div>
            </div>
        @else
            <div class="or_hs_no">
                <span>No data found</span>
            </div>
        @endauth
        <div class="hm_bottom_cont">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffde00" fill-opacity="1" d="M0,96L48,85.3C96,75,192,53,288,53.3C384,53,480,75,576,96C672,117,768,139,864,133.3C960,128,1056,96,1152,106.7C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });

        $("body").on('click','.at-title',function () {
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

    $('#ticket_no, #order_no').on('change',function () {
        let ticket = $('#ticket_no').val();
        let order = $('#order_no').val()
        filter_data(ticket,order)
    })

    function filter_data(ticket_no,order_no){
        $.ajax({
            url: '{{route("get_orders")}}',
            type: 'GET',
            data: {
                ticket_no:ticket_no,
                order_no:order_no
            },
            success: function (response) {
                let html='';
                let count = 1;
                if(response.length != 0 && (ticket_no != '' || order_no != '')){
                    $.each(response, function( index, value ) {
                        html += `<div class="at-item">
                            <div class="at-title">
                                <div class="order_hs_innersec">
                                    <p class="oh_ticknumber" > <label> ${value.user.name.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                            return letter.toUpperCase();
                        })} </label></p>
                                    <p class="status">${$.datepicker.formatDate('dd-mm-yy', new Date(value.created_at))}</p>
                                </div>
                            </div>
                            <div class="at-tab" ${ count == 1 ? 'style="display: block;"' :"" }>
                                <div class="acc_or_con">
                                    <div class="acc_col_4 ord_his_acc_rk">
                                        <label> Mobile No </label>
                                        <span>${value.user.mobile_no}</span>
                                    </div>
                                    <div class="acc_col_4 ord_his_acc_rk">
                                        <label> Ticket Price</label>
                                        <span>${value.ticket_amount}</span>
                                    </div>
                                    <div class="acc_col_4 ord_his_acc_rk">
                                        <label> Ticket No </label>`;
                        $.each(JSON.parse(value.ticket_no),function(i,v){
                            if(v == ticket_no){
                                html += `<span style="color: red">${v}</span>`;
                            }else{
                                html += `<span>${v}</span>`;
                            }
                        })
                        html += `</div>
                                    <div class="acc_col_4 ord_his_acc_rk">
                                        <label> Chance</label>`;
                        $.each(JSON.parse(value.chances),function(i,v){
                            html += `<span>${v}</span>`;
                        })
                        html += `</div>
                                </div>
                            </div>
                        </div>`;
                        count++;
                    });
                }else if(response.length == 0 && (ticket_no != '' || order_no != '')){
                    html += `<div class="or_hs_no">
                        <img src="{{asset('/img/no_data.png')}}" class="cart" alt="cart">
                        <span>No data found</span>
                    </div>`;
                }
                else{
                    html += `<div class="or_hs_no">
                        <img src="{{asset('/img/search.png')}}" class="cart" alt="cart">
                        <span>Search By Ticket No.</span>
                    </div>`;
                }
                $('.accordion.order_hs_sec').html(html)
            }
        });
    }

    $('#exportBtn').on('click', function () {
        let ticket_no = $('#ticket_no').val();
        let order_no = $('#order_no').val()
        if(ticket_no != ''){
            var query_string = 'ticket_no='+ticket_no;
        }
        if(order_no != ''){
            var query_string = 'order_no='+order_no;
        }
        if(ticket_no != '' && order_no != ''){
            var query_string = 'ticket_no='+ticket_no+'&order_no='+order_no;
        }
        var exportUrl = "{{ route('export') }}" + "?"+query_string;
        window.location.href = exportUrl;
    });

    function export_myFunction() {
        document.getElementById("exp_myDropdown").classList.toggle("show");
    }
</script>

@endsection
