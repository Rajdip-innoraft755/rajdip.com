$(document).ready(function(){
    $(".fname>input").keyup(function() {
        $(".fname>.error").css("display","none");
        $(".fullname>input").val($(".fname>input").val()+" "+$(".lname>input").val());
      });
      $(".lname>input").keyup(function() {
        $(".lname>.error").css("display","none");
        $(".fullname>input").val($(".fname>input").val()+" "+$(".lname>input").val());
      });
      // if($(".fname>input").val()=='' || $(".lname").val()=='');
      
      // return true;
});
