$(document).ready(function(){
    $(".fname>input").keyup(function() {
        $(".fname>.error").css("display","none");
        $(".fullname>input").val($(".fname>input").val()+" "+$(".lname>input").val());
      });
      $(".lname>input").keyup(function() {
        $(".lname>.error").css("display","none");
        $(".fullname>input").val($(".fname>input").val()+" "+$(".lname>input").val());
      });
      $(".img-upload>button").click(function() {
        $(".image-upload>.error").css("display","none");
      });
});
