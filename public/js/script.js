$(".register_clk").click(function() {
    $("body").css('overflow','hidden'); 
    $(".login_popup").hide();
    $(".signUp_popup").show();

})

$(".cls_close_popup").click(function() {
    $("body").css('overflow','auto'); 
    $(".login_popup").hide();
    $(".signUp_popup").hide();

})

$(".login_clk").click(function() {
    $("body").css('overflow','hidden'); 
    $(".signUp_popup").hide();
    $(".login_popup").show();
  

})