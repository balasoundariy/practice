<div class="popup_container" >
    <section class="rk_popup login_popup" style="display: none;">
        <div class="main_page_login_section login_section">
            <span class="pop_close pc_box_shadow cls_close_popup">
                <i class="fa fa-times" aria-hidden="true"></i>
            </span>
            <div class="top_cont">
                <h2 class="bc_h2"> New here ?</h2>
                <p class="bc_p">Your email address must be verified before you can comment. Check your inbox for the verification link, </p>
                <button class="bc_signin dev_sign_up_btn">Sign Up</button>
            </div>

            <p class="titt_sign mtop_100"> Sign in</p>

            <div class="fields">
                <div class="input_con username">
                    <span class="user_icon">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                    </span>
                    <input type="tel" class="user-input" placeholder="Mobile No" id="mobile">
                </div>
                <div class="input_con f-password">
                    <span class="user_icon">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    <input type="password" class="pass-input" placeholder="Password" id="password_sign_in">
                </div>
            </div>
            <div class="btn_container">
                <button class="reg-button" id="login_btn">Sign In</button>
            </div>
        </div>
    </section>
    <section class="rk_popup signUp_popup" style="display: none;">
        <div class="main_page_login_section">
            <span class="pop_close cls_close_popup">
                <i class="fa fa-times" aria-hidden="true"></i>
            </span>
            <p class="titt_sign"> Sign up</p>
            <div class="fields">
                <div class="input_con">
                    <span class="user_icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                    <input type="text" class="name-input" placeholder="Name" id="name">
                </div>
                <div class="input_con email">
                    <span class="user_icon">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                    </span>
                    <input type="tel" class="email-input" placeholder="Mobile No" id="mobile_no">
                </div>
                <div class="input_con username">
                    <span class="user_icon">
                        <i class="fa fa-city email_icon" aria-hidden="true"></i>
                    </span>
                    <input type="text" class="user-input" placeholder="City" id="city">
                </div>
                <div class="input_con f-password">
                    <span class="user_icon">
                        <i class="fa fa-city email_icon" aria-hidden="true"></i>
                    </span>
                    <input type="text" class="pass-input" placeholder="State" id="state">
                </div>
                <div class="input_con f-password">
                    <span class="user_icon">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    <input type="password" class="password-input2" placeholder="Password" id="password_sign_up">
                </div>
            </div>
            <div class="btn_container">
                <button class="reg-button" id="register_btn">Sign Up</button>
            </div>
            <div class="bottom_cont">
                <h2 class="bc_h2">One of us?</h2>
                <p class="bc_p">Your email address must be verified before you can comment. Check your inbox for the verification link, or visit your account settings to resend the email. </p>
                <button class="bc_signin dev_sign_in_btn"> Sign In</button>
            </div>
        </div>
    </section>
    <section class="rk_popup success_popup" style="display: none;">
        <div class="main_container">
            <div class="lp_main_banner">
                <img src="/img/tick.png" class="cart" alt="cart">
            </div>
            <h1 class="lp_sw_p"> Ticket</h1>
            <p class="lp_p">Placed  successfully !</p>
            <button class="lp_choose_btn">
                <a href="{{route('home')}}"> Home </a>
            </button>
        </div>
    </section>
</div>
