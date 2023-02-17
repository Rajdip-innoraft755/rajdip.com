$(document).ready(function(){
    $(".fname>input").keyup(function() {
        $(".fname>.error").css("display","none");
        $(".fullname>input").val($(".fname>input").val()+" "+$(".lname>input").val());
      });
      $(".lname>input").keyup(function() {
        $(".lname>.error").css("display","none");
        $(".fullname>input").val($(".fname>input").val()+" "+$(".lname>input").val());
      });
      $(".marks-table>textarea").keyup(function(){
        $(".marks-table>.error").css("display","none");
      });
      $(".phone>input").keyup(function() {
        $(".phone>.error").css("display","none");
      });
});
