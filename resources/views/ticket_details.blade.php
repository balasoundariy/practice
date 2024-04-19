@extends('layout.layout')

@section('content')

    <h1 class="tic_details">Ticket details</h1>

    
    <div class="tic_container"> 

                <div class="tic_details_con"> 
            <div class="col_md_8">
            <p class="ticdet_p" > Number </p>
            </div>

            <div class="col_md_4">
            <p class="ticdet_p"> Chance</p>
            </div>
                </div>


                <div class="tic_details_con"> 
            <div class="col_md_8">
            <input type="number" inputmode="numeric" id="number_1" name="number_1" min="1" max="5">
            </div>

            <div class="col_md_4">
            <input type="number" inputmode="numeric" id="chance_1" name="chance_1" min="1" max="5">
            </div>
                </div>



                <div class="tic_details_con"> 
            <div class="col_md_8">
            <input type="number" inputmode="numeric" id="number_2" name="number_2" min="1" max="5">
            </div>

            <div class="col_md_4">
            <input type="number" inputmode="numeric" id="chance_2" name="chance_2" min="1" max="5">
            </div>
                </div>

                <div class="tic_details_con"> 
            <div class="col_md_8">
            <input type="number" inputmode="numeric" id="number_3" name="number_3" min="1" max="5">
            </div>

            <div class="col_md_4">
            <input type="number" inputmode="numeric" id="chance_3" name="chance_3" min="1" max="5">
            </div>
                </div>


                <div class="tic_details_con"> 
            <div class="col_md_8">
            <input type="number" id="number_4" name="number_4" min="1" max="5">
            </div>

            <div class="col_md_4">
            <input type="number" id="chance_4" name="chance_4" min="1" max="5">
            </div>
                </div>

    </div>

@endsection
