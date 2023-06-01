$(function(){
  $(window).scroll(function(){
      if($(this).scrollTop() > 500){
          $("#topBtn").fadeIn()
      }else{
          $("#topBtn").fadeOut()
      }
  })
  
  $("#topBtn").click(function(){
      $("html").animate({scrollTop:0},1000,"swing")
  })
})