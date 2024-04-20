@extends('layout.layout')

@section('content')
    <h1 class="tic_details">Ticket details</h1>
    <div class="tic_container">
        <form action="{{route('summary')}}" method="post">
            @csrf
            <input type="hidden" name="ticket_amount" value="{{$price}}">
            <div class="tic_details_con">
                <div class="col_md_8">
                    <p class="ticdet_p">Number</p>
                </div>
                <div class="col_md_4">
                    <p class="ticdet_p">Chance</p>
                </div>

            </div>
            <div class="tic_details_con">
                <div class="col_md_8">
                    <input type="number" inputmode="numeric" name="ticket_no[]">
                </div>
                <div class="col_md_4">
                    <input type="number" inputmode="numeric" name="chances[]">
                </div>
                <div class="col_md_4 dev_delete">delete</div>
            </div>
            <button id="add_field" type="button">add</button>
            <button type="submit">next</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        let content = '<div class="tic_details_con"><div class="col_md_8"><input type="number" inputmode="numeric" name="ticket_no[]"></div><div class="col_md_4"><input type="number" inputmode="numeric" name="chances[]"></div><div class="col_md_4 dev_delete">delete</div></div>';
        $('body').on('click','#add_field',function () {
            $(this).before(content);
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
