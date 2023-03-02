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
    $(".mail>input").keyup(function() {
      $(".mail>.error").css("display","none");
    });
    $('#show-hide').on('click', function(){
      var passInput=$(".password");
      if(passInput.attr('type')==='password'){
        passInput.attr('type','text');
        $('#show-hide').css("color","red");
      }
      else{
        passInput.attr('type','password');
        $('#show-hide').css("color","black");
      }
  });
});

