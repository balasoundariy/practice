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
            <input type="hidden" name="ticket_amount" id="ticket_amount" value="{{$price}}">
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
                        <input type="number" inputmode="numeric" name="ticket_no[]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "3">
                    </div>
                    <div class="col_md_2">
                        <input type="number" inputmode="numeric" name="chances[]" class="dev_chances">
                    </div>
                    <div class="col_md_1 dev_delete " > <i class="fa fa-trash-o del_icon" aria-hidden="true"></i></div>
                </div>
                <div class="tic_details_con">
                    <div class="col_md_8">
                        <input type="number" inputmode="numeric" name="ticket_no[]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "3">
                    </div>
                    <div class="col_md_2">
                        <input type="number" inputmode="numeric" name="chances[]" class="dev_chances">
                    </div>
                    <div class="col_md_1 dev_delete " > <i class="fa fa-trash-o del_icon" aria-hidden="true"></i></div>
                </div>
                <div class="tic_details_con">
                    <div class="col_md_8">
                        <input type="number" inputmode="numeric" name="ticket_no[]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "3">
                    </div>
                    <div class="col_md_2">
                        <input type="number" inputmode="numeric" name="chances[]" class="dev_chances">
                    </div>
                    <div class="col_md_1 dev_delete " > <i class="fa fa-trash-o del_icon" aria-hidden="true"></i></div>
                </div>
                <div class="tic_details_con">
                    <div class="col_md_8">
                        <input type="number" inputmode="numeric" name="ticket_no[]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "3">
                    </div>
                    <div class="col_md_2">
                        <input type="number" inputmode="numeric" name="chances[]" class="dev_chances">
                    </div>
                    <div class="col_md_1 dev_delete " > <i class="fa fa-trash-o del_icon" aria-hidden="true"></i></div>
                </div>
                <div class="tic_details_con">
                    <div class="col_md_8">
                        <input type="number" inputmode="numeric" name="ticket_no[]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "3">
                    </div>
                    <div class="col_md_2">
                        <input type="number" inputmode="numeric" name="chances[]" class="dev_chances">
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
@endsection

@section('scripts')
    <script>
        let no = 5;
        $('body').on('click','#add_field',function () {
            let content = '';
            for(i=1;i<=5;i++){
                content += `<div class="tic_details_con">
                    <div class="col_md_8">
                        <input type="number" inputmode="numeric" name="ticket_no[]" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "3">
                    </div>
                    <div class="col_md_2">
                        <input type="number" inputmode="numeric" name="chances[]" class="dev_chances">
                    </div>
                    <div class="col_md_1 dev_delete " > <i class="fa fa-trash-o del_icon" aria-hidden="true"></i></div>
                </div>`;
                no++;
            }
            if(no <= 50){
                console.log(no)
                $(this).parent().before(content);
            }
        })

        $('.dev_chances').on('input', function(e) {
            const inputValue = $(this).val();
            const numericValue = parseFloat(inputValue);
            const ticket_amount = $('#ticket_amount').val();
            let limit = 10;
            if(ticket_amount == 60){
                limit = 5;
            }
            if (numericValue > limit) {
                $(this).val(inputValue.slice(0, -1));
            }
        });

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
