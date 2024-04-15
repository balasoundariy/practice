@extends('layout.layout')
@section('content')
    <header class="main__pg__header">
        <div class="head__txt__sec"><img src ="{{asset('assets/image/jackpot_logo.png')}}" alt=""></div>
        <div class="header_sec">
            <div class="sign__img__sec sign__in__logo"><img class="sign_in_icon" src="{{asset('assets/image/signin.png')}}" alt=""></div>
            <div class="sign__img__sec sign__up__logo"><img class="sign_up_icon" src="{{asset('assets/image/signup.png')}}" alt=""></div>
        </div>
    </header>
    <main class ="main__cont_sec">
        <div class="main__sec">
            <p>Home page</p>
        </div>

        <section class="login__sec_con" style="display:none">
            <div class="login__sec__content">
                <div class="close__icon sign__in__close"><img src ="{{asset('assets/image/close_icon.svg')}}" alt=""></div>
                <div class="brand__logo"><img src ="{{asset('assets/image/jackpot_logo.png')}}" alt=""></div>
                <div class="user__logo"><p>SIGN IN</p></div>  
                <form class="signIn__form__sec">
                    <div class="sign__inps signIn__inp__sec">
                        <input type="num" class="inp__user" placeholder="Mobile Number" autocomplete="off">
                        <p class="inp__error__txt">Error message</p>
                    </div>
                    <div class="sign__inps signIn__inp__sec">
                        <input type="password" class="inp__user" placeholder="Password" autocomplete="off">
                        <p class="inp__error__txt">Error message</p>
                    </div>
                    <div class="forgot__sec__text"><p>Forgot password?</p></div>
                    <div class="sign__in__sec">
                        <button>Sign In</button>
                    </div>
                </form> 
            </div>
        </section>

        <section class="reg__sec_con" style="display:none">
            <div class="reg__sec__content">
                <div class="close__icon sign__up__close"><img src ="{{asset('assets/image/close_icon.svg')}}" alt=""></div>
                <div class="brand__logo"><img src ="{{asset('assets/image/jackpot_logo.png')}}" alt=""></div>
                <div class="user__logo"><p>SIGN UP</p></div>
                <form class="reg__form__sec">
                    <div class="sign__inps signIn__inp__sec">
                        <input type="text" class="inp__user" placeholder="Name">
                        <p class="inp__error__txt">Error message</p>
                    </div>
                    <div class="sign__inps signIn__inp__sec">
                        <input type="password" class="inp__user" placeholder="Password">
                        <p class="inp__error__txt">Error message</p>
                    </div>
                    <div class="sign__inps signIn__inp__sec">
                        <input type="num" class="inp__user" placeholder="Mobile Number">
                        <p class="inp__error__txt">Error message</p>
                    </div>
                    <div class="sign__inps signIn__inp__sec">
                        <input type="text" class="inp__user" placeholder="City">
                        <p class="inp__error__txt">Error message</p>
                    </div>
                    <div class="sign__inps signIn__inp__sec">
                        <input type="text" class="inp__user" placeholder="State">
                        <p class="inp__error__txt">Error message</p>
                    </div>
                    <div class="sign__inps signIn__inp__sec">
                        <input type="num" class="inp__user" placeholder="UPI Mobile number">
                        <p class="inp__error__txt">Error message</p>
                    </div>
                    <div class="sign__up__sec">
                        <button>Sign Up</button>
                    </div>
                </form> 
            </div>
        </section>
        <section class="tickt__amnt__sec" style="display:none">
            <div class="tickt__sec__content">

                <div class="pg__header__sec">
                    <div class="pg__bk__arrrow first__pg__cnt">
                        <img src ="{{asset('assets/image/arrow_back.svg')}}" alt="">
                    </div>
                    <h1 class="tkt__title">Ticket Amount</h1>
                </div>

                <div class="tkt__amnt__innerSec">
                    <div class="tkt_amnt_box"><span>₹100</span></div>
                    <div class="tkt_amnt_box"><span>₹200</span></div>
                    <div class="tkt_amnt_box"><span>₹500</span></div>
                    <div class="tkt_amnt_box"><span>₹1000</span></div>
                    <div class="tkt_amnt_box"><span>₹5000</span></div>
                    <div class="tkt_amnt_box"><span>₹10,000</span></div>
                </div>
                
                <div class="pg__next__btn pg_next_fst_btn"><button>Next</button></div>

            </div>
        </section>

        <section class="tickt__amnt__sec1" style="display:none">
            <div class="tickt__sec__content1">

                <div class="pg__header__sec1">
                    <div class="pg__bk__arrrow second__pg__cnt">
                        <img src ="{{asset('assets/image/arrow_back.svg')}}" alt="">
                    </div>
                    <h1 class="tkt__title1">Ticket Chances</h1>
                </div>

                <div class="payment__chance__page">
                    <div class="cont__add__txt__sec">
                        <p>Number</p>
                        <p>Chance</p>
                    </div>
                    <div class="cont__add__sec">
                        <div class="cont__added__div__sec">
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec1"></div>
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec2"></div>
                        </div>
                        <div class="cont__added__div__sec">
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec1"></div>
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec2"></div>
                        </div>
                        <div class="cont__added__div__sec">
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec1"></div>
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec2"></div>
                        </div>
                        <div class="cont__added__div__sec">
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec1"></div>
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec2"></div>
                        </div>
                        <div class="cont__added__div__sec">
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec1"></div>
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec2"></div>
                        </div>
                        <div class="cont__added__div__sec">
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec1"></div>
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec2"></div>
                        </div>
                        <div class="cont__added__div__sec">
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec1"></div>
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec2"></div>
                        </div>
                        <div class="cont__added__div__sec">
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec1"></div>
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec2"></div>
                        </div>
                        <div class="cont__added__div__sec">
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec1"></div>
                            <div class="cont__add__inp__sec"><input type="text" class="chance__inp chance__inp_sec2"></div>
                        </div>
                    </div>
                    <div class="chnce__add__btn"><button>Add</button></div>
                </div>
                
                <div class="pg__next__btn"><button>Next</button></div>

            </div>
        </section>

    </main>
@endsection

@section('scripts')
    <script>

        $(window).on('beforeunload', function() {
            $(window).scrollTop(0);
        });

        $('body').on('click', '.sign__in__logo', function(){
            $('body,html').css('overflow','hidden');
            $('.login__sec_con').show();
        });

        $('body').on('click', '.sign__in__close', function(){
            $('body,html').css('overflow','');
            $('.login__sec_con').hide();
        });

        
        $('body').on('click', '.sign__up__logo', function(){
            $('body,html').css('overflow','hidden');
            $('.reg__sec_con').show();
        });

        $('body').on('click', '.sign__up__close', function(){
            $('body,html').css('overflow','');
            $('.reg__sec_con').hide();
        });
        $('body').on('click', '.main__sec', function(){
            $('.tickt__amnt__sec').show();
            $('body,html').css('overflow','hidden');
        });

        $('body').on('click', '.first__pg__cnt', function(){
            $('.tickt__amnt__sec').hide();
            $('body,html').css('overflow','');
        });
        
        $('body').on('click', '.pg_next_fst_btn', function(){
            $('.tickt__amnt__sec').hide();
            $('.tickt__amnt__sec1').show();
            $('body,html').css('overflow','hidden');
        });
        $('body').on('click','.second__pg__cnt', function(){
            $('.tickt__amnt__sec').show();
            $('.tickt__amnt__sec1').hide();
            $('body,html').css('overflow','hidden');
        })

    </script>
@endsection