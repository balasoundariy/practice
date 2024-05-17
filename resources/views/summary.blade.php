@extends('layout.layout')

@section('content')

    <div class="payment_sec_head">
        <a class="icon_arr" onclick="window.history.back();"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> </a>
        <h1 class="payment_h1">Payment</h1>
    </div>
    <a href="{{route('ticket')}}">add ticket</a>
    <div class="summaary_cart_con" style="">
        <div class="shoping_cart">
            <div class="shoping_c_left">Summary</div>
            <div class="sc_del">
{{--                <i class="fa fa-trash-o " aria-hidden="true"></i>--}}
            </div>
        </div>
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
        

{{--        <div class="shoping_cart_head nodata_found">--}}
{{--            <div class="No_found">No Data Found</div>--}}
{{--        </div>--}}




    </div>
    <div class="totalsumm_con">
        <p class="total_summ_p"> Total amount</p>
        <div class="summ_inr_con"><i class="fa fa-inr" aria-hidden="true"></i>{{indian_currency_for($tickets)}}</div>
    </div>
    <button class="summary_choose_btn" id="payment">Pay</button>
@endsection

@section('scripts')
    <script>
        {{--$('body').on('click','.delete_icon',function () {--}}
        {{--    $.ajax({--}}
        {{--        url: '{{route('payment')}}',--}}
        {{--        type:'get',--}}
        {{--        success:function (response){--}}
        {{--            if(response.status == 200){--}}
        {{--                $('.success_popup').show();--}}
        {{--            }else{--}}

        {{--            }--}}
        {{--        },--}}
        {{--        error:function (){--}}

        {{--        }--}}
        {{--    })--}}
        {{--})--}}

        $('body').on('click','#payment',function () {
            $.ajax({
                url: '{{route('payment')}}',
                type:'get',
                success:function (response){
                    if(response.status == 200){
                        $('.success_popup').show();
                    }else{

                    }
                },
                error:function (){

                }
            })
        })
    </script>
@endsection
