$(".register_clk").click(function() {
    $("body").css('overflow','hidden');
    $(".login_popup").hide();
    $(".signUp_popup").show();
})

$(".cls_close_popup").click(function() {
    $("body").css('overflow','auto');
    $(".success_popup").hide();
    $(".login_popup").hide();
    $(".signUp_popup").hide();
})

$(".login_clk").click(function() {
    $("body").css('overflow','hidden');
    $(".success_popup").hide();
    $(".signUp_popup").hide();
    $(".login_popup").show();
})

$(".lottery_succes").click(function() {
    $("body").css('overflow','hidden');
    $(".signUp_popup").hide();
    $(".login_popup").hide();
    $(".success_popup").show();
})

$(".ticket_select").click(function() {
    $('.ticket_select').removeClass('active');
    $(this).addClass('active');
})

$(".sidemenu_clk").click(function() {
    $("body").css('overflow','hidden');
     $('#myNav').removeClass('open');
     $('#myNav').addClass('open');
})

$(".menu_close").click(function() {
    $("body").css('overflow','auto');
    $('#myNav').removeClass('open');
})


