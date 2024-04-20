<script src="{{asset('/assets/js/toaster.js')}}"></script>
<script>
    toastr.options = {
        "preventDuplicates": true,
        "preventOpenDuplicates": true
    };

    let mnv_value = '';

    $('body').on('input','#mobile_no',function(e){
        let mnv_input = $(this);
        let mnv_pattern = /^[6-9]{1}[0-9]{0,9}$/;
        let mnv_currentValue = mnv_input.val();
        if (mnv_currentValue && !mnv_pattern.test(mnv_currentValue)) {
            mnv_input.val(mnv_value);
        } else {
            mnv_value = mnv_currentValue;
        }
    });

    $('#name,#city,#state').on('input',function () {
        $(this).val($(this).val().replace(/(\s{2,})|[^a-zA-Z0-9-.,/_]/g, ' '));
    });

    $('body').on('click','#register_btn',function () {
        const name = $('#name').val();
        const mobile_no = $('#mobile_no').val();
        const city = $('#city').val();
        const state = $('#state').val();
        const password = $('#password_sign_up').val();
        console.log(mobile_no)
        if (name == '' && mobile_no == '' && city == '' && state == '' && password == '') {
            toastr.error('Please enter the details');
        } else if (name == '' || mobile_no == '' || city == '' || state == '' || password == '') {
            if (name == '')  {
                toastr.error('Please enter Name');
            } else if (mobile_no == '') {
                toastr.error('Please enter Mobile No');
            } else if (city == '') {
                toastr.error('Please enter City');
            } else if (state == '') {
                toastr.error('Please enter State');
            } else if (password == '') {
                toastr.error('Please enter Password');
            }
        }else{
            if(name.length < 3 || name.length > 30){
                toastr.error('Name cannot be less than 3 and greater than 30 letters.')
            } else if(city.length < 3 || city.length > 30){
                toastr.error('City cannot be less than 3 and greater than 30 letters.')
            } else if(state.length < 3 || state.length > 30){
                toastr.error('State cannot be less than 3 and greater than 30 letters.')
            } else if(password.indexOf(' ') >= 0){
                toastr.error('Password cannot contain space');
            } else if(password.length < 8 || password.length > 30) {
                toastr.error('Password must contain a Min 8 and Max 30 character');
            } else{
                $.ajax({
                    url:'{{route('register')}}',
                    type:'post',
                    data:{
                        'name': name,
                        'mobile_no': mobile_no,
                        'city': city,
                        'state': state,
                        'password': password,
                        _token: "{{csrf_token()}}"
                    },
                    success:function (response){
                        if(response.status == 200){
                            toastr.success(response.message)
                            setTimeout(function(){
                                window.location = '{{route('home')}}';
                            },1000);
                        }else{
                            toastr.error(response.message);
                        }

                    },
                    error:function () {

                    }
                })
            }
        }
    })

    $('body').on('click','#login_btn',function () {
        const mobile_no = $('#mobile').val();
        const password = $('#password_sign_in').val();

        if (mobile_no == '' && password == '') {
            toastr.error('Please enter the details');
        } else if (mobile_no == '' || password == '') {
            if (mobile_no == '') {
                toastr.error('Please enter Mobile No');
            } else {
                toastr.error('Please enter Password');
            }
        }else{
            $.ajax({
                url:'{{route('login')}}',
                type:'post',
                data:{
                    'mobile_no': mobile_no,
                    'password': password,
                    _token: "{{csrf_token()}}"
                },
                success:function (response){
                    if(response.status == 200){
                        toastr.success(response.message)
                        setTimeout(function(){
                            window.location = '{{route('home')}}';
                        },1000);
                    }else{
                        toastr.error(response.message);
                    }

                },
                error:function () {

                }
            })
        }
    })

    $('body').on('click','.dev_sign_up_btn',function () {
            $('.login_popup').hide()
            $('.signUp_popup').show()
    })
    $('body').on('click','.dev_sign_in_btn',function () {
            $('.signUp_popup').hide()
            $('.login_popup').show()
    })

    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }
    @auth()
    window.onclick = function(e) {
        if (!e.target.matches('.cart') &&!e.target.matches('.dropbtn')) {
            const myDropdown = document.getElementById("myDropdown");
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }
    @endauth
</script>
