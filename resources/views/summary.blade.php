@extends('layout.layout')

@section('content')
    <div class="payment_sec_head">
        <a class="icon_arr" href="#" ><i class="fa fa-arrow-left " aria-hidden="true"></i> </a>
        <h1 class="payment_h1">Payment</h1>
    </div>
    <div class="summ_container">
        <label class="sum_label"> Number Choosed</label>
        <p class="nc_p"> {{implode(',',json_decode($tickets->ticket_no,true))}}</p>
        <label class="sum_label"> Number of Chance</label>
        <p class="nc_p"> {{implode(',',json_decode($tickets->chances,true))}}</p>
        <label class="sum_label"> Possible winnings</label>
        <p class="pw_p"> <i class="fa fa-inr" aria-hidden="true"></i>10,000 to <i class="fa fa-inr" aria-hidden="true"></i>25,000</p>
    </div>
    <div class="totalsumm_con">
        <p class="total_summ_p"> total </p>
        <div class="summ_inr_con"><i class="fa fa-inr" aria-hidden="true"></i>{{$tickets->total}}</div>
    </div>
    <button class="summary_choose_btn" id="payment">Pay</button>
@endsection

@section('scripts')
    <script>
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
