<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('/css/styles.css')}}" />
        <title>Home page</title>
    </head>
    <body>
        <div class="home_container">
            <header class="main__pg__header">
                <div class="head__txt__sec"><img src ="{{asset('/img/jackpot_logo.png')}}" alt=""></div>
                <div class="header_sec">
                    <div class="sign__img__sec sign__up__logo"><img class="sign_up_icon" src="{{asset('/img/user_icon.png')}}" alt=""></div>
                </div>
            </header>
            <main class ="main__cont_sec home">
                <div class="main__sec">
                    <div class="home-wellcome">
                        <img class="winner_img" src="{{asset('/img/winner.png')}}" alt="">
                        <h1><span>Start winning</span> with your best emotios</h1>
                        <div class="home-btn-wrapper">
                            <a href="#">Choose Ticket</a>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffe000" fill-opacity="1" d="M0,32L48,37.3C96,43,192,53,288,85.3C384,117,480,171,576,186.7C672,203,768,181,864,176C960,171,1056,181,1152,202.7C1248,224,1344,256,1392,272L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
                    </div>

                </div>
            </main>
        </div>


        <script src="{{asset('/js/script.js')}}"></script>
    </body>
</html>
