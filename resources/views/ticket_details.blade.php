@extends('layout.layout')

@section('content')

<style>
    body
    {
        background-color:#ffe000;
    }
</style>
    <!-- <h1 class="tic_details">Ticket details</h1> -->
    <div class="payment_sec_head">
        <a class="icon_arr" onclick="window.history.back();"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> </a>
        <h1 class="payment_h1">Ticket details</h1>
    </div>


    <div class="tic_container">
        <form action="{{route('summary')}}" method="post">
            @csrf
            <input type="hidden" name="ticket_amount" value="{{$price}}">
            <div class="tic_details_con">
                <div class="col_md_8">
                    <p class="ticdet_p">Number</p>
                </div>
                <div class="col_md_2">
                    <p class="ticdet_p">Chance</p>
                </div>
                <div class="col_md_1">
                    <p class="ticdet_p"></p>
                </div>

            </div>
<div class="tic_dt_min_height">
            <div class="tic_details_con">
                <div class="col_md_8">
                    <input type="number" inputmode="numeric" name="ticket_no[]">
                </div>
                <div class="col_md_2">
                    <input type="number" inputmode="numeric" name="chances[]">
                </div>
                <div class="col_md_1 dev_delete " > <i class="fa fa-trash-o del_icon" aria-hidden="true"></i></div>
            </div>

            <div class="td_btn_con">
            <button class="td_btn" id="add_field" type="button">add</button>
             </div>

</div>


<div class="td_btn_con next_btn">
            <button class="td_btn" type="submit">next</button>
</div>
        </form>
    </div>
    <div class="hm_bottom_cont">

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffde00" fill-opacity="1" d="M0,96L48,85.3C96,75,192,53,288,53.3C384,53,480,75,576,96C672,117,768,139,864,133.3C960,128,1056,96,1152,106.7C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</div>
@endsection

@section('scripts')
    <script>
        let content = `<div class="tic_details_con">
                <div class="col_md_8">
                    <input type="number" inputmode="numeric" name="ticket_no[]">
                </div>
                <div class="col_md_2">
                    <input type="number" inputmode="numeric" name="chances[]">
                </div>
                <div class="col_md_1 dev_delete " > <i class="fa fa-trash-o del_icon" aria-hidden="true"></i></div>
            </div>`;
        $('body').on('click','#add_field',function () {
            $(this).parent().before(content);
        })

        $('body').on('click','.dev_delete',function () {
            let elem_fields = $('.tic_details_con').length-1;
            if(elem_fields > 1){
                $(this).closest('.tic_details_con').remove();
            }else{
                toastr.error('At least one field is required')
            }
        })

        $("form").submit(function (event) {
            event.preventDefault();
            const ticket_no = $("input[name='ticket_no[]']").map(function(){return $(this).val();}).get();
            const chances = $("input[name='chances[]']").map(function(){return $(this).val();}).get();
            if($.inArray("", ticket_no) !== -1){
                toastr.error('Please fill the Ticket No')
            }else if($.inArray("", chances) !== -1){
                toastr.error('Please fill the Chance')
            }else{
                $(this).unbind('submit').submit();
            }
        });
    </script>
@endsection
