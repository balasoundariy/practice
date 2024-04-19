
<header class="header">

@auth()
    <div class="header_con">
   <div class="main_logo"> <img src="img/jackpot_logo.png" class="cart" alt="cart"> </div>
  <div  class="acc_sec" onclick="myFunction()" ><img src="img/user_icon.png" class="cart" alt="cart"> </div>

  <div class="dropdown-content" id="myDropdown">
    <a href="{{route('logout')}}">Logout</a>

  </div>
</div>


@else
<div class="header_con">
<div class="main_logo"> <img src="img/jackpot_logo.png" class="cart" alt="cart"> </div>
<div class="bf_login_con">
        <button class="btncon_reg register_clk" > Register </button>
        <button class="btncon_log login_clk" > Login </button>
</div>
</div>
    @endauth


  </header>
