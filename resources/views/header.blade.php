<header class="header">
    @auth()
        <div class="header_con">
            @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
                <div class="hamburger sidemenu_clk"> <i class="fa fa-bars" aria-hidden="true"></i> </div>
            @endif
            <div class="main_logo">
                <a href="{{route('home')}}">
                    <img src="{{asset('/img/logo.png')}}" class="cart" alt="cart">
                </a>
            </div>
            <div  class="acc_sec" onclick="myFunction()">
                <img src="{{asset('/img/user_icon.png')}}" class="cart" alt="cart">
            </div>
            <div class="dropdown-content" id="myDropdown">
                <a href="{{route('logout')}}">Logout</a>
            </div>
        </div>
    @else
        <div class="header_con flex_start">
            @if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
                <div class="hamburger sidemenu_clk" > <i class="fa fa-bars" aria-hidden="true"></i> </div>
            @endif
            <div class="main_logo">
                <a href="#">
                    <img src="{{asset('/img/logo.png')}}" class="cart" alt="cart">
                </a>
            </div>
            <div class="bf_login_con">
                <button class="btncon_reg register_clk" > Register </button>
                <button class="btncon_log login_clk" > Login </button>
            </div>
        </div>
    @endauth
</header>
@if(\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role == 'admin')
    @include('admin.side_menu')
@endif
