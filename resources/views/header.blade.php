<header class="header">
    <div class="header_con">
        <div class="main_logo">
            <img src="{{asset('/img/logo.png')}}" class="cart" alt="cart">
        </div>
        @auth()
            <div  class="acc_sec" onclick="myFunction()">
                <img src="{{asset('/img/user_icon.png')}}" class="cart" alt="cart">
            </div>
            <div class="dropdown-content" id="myDropdown">
                <a href="{{route('logout')}}">Logout</a>
            </div>
        @else
            <div class="bf_login_con">
                <button class="btncon_reg register_clk" > Register </button>
                <button class="btncon_log login_clk" > Login </button>
            </div>
        @endauth
    </div>
</header>
