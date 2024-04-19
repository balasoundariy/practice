
<header class="header">

@auth()
    <div class="header_con">
   <div class="main_logo"> <img src="img/jackpot_logo.png" class="cart" alt="cart"> </div>
  <div  class="acc_sec"><img src="img/user_icon.png" class="cart" alt="cart"> </div>
</div>


@else
<div class="header_con">
        <button class="register_clk" > Register </button>
        <button class="login_clk" > Login </button>
</div>
    @endauth


  </header>
