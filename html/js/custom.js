$(document).ready(function () {
  $(".fname>input").keyup(function () {
    $(".fname>.error").css("display", "none");
    $(".fullname>input").val(
      $(".fname>input").val() + " " + $(".lname>input").val()
    );
  });
  $(".lname>input").keyup(function () {
    $(".lname>.error").css("display", "none");
    $(".fullname>input").val(
      $(".fname>input").val() + " " + $(".lname>input").val()
    );
  });
  $(".marks-table>textarea").keyup(function () {
    $(".marks-table>.error").css("display", "none");
  });
  $(".phone>input").keyup(function () {
    $(".phone>.error").css("display", "none");
  });
  $(".mail>input").keyup(function () {
    $(".mail>.error").css("display", "none");
  });
  $(".password").keyup(function () {
    var PassRegEx =
      /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!PassRegEx.test($(this).val())) {
      $(this).css("border", "red 2px solid");
    } else {
      $(this).css("border", "green 2px solid");
    }
  });

  $(".email>input").keyup(function () {
    var EmailRegEX = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!EmailRegEX.test($(this).val())) {
      $(this).css("border", "red 2px solid");
    } else {
      $(this).css("border", "green 2px solid");
    }
  });

  $("#show-hide").on("click", function () {
    var passInput = $(".password");
    if (passInput.attr("type") === "password") {
      passInput.attr("type", "text");
      $("#show-hide").css("color", "blue");
    } else {
      passInput.attr("type", "password");
      $("#show-hide").css("color", "black");
    }
  });

  $(".account").on("click",function(){
    $(".slide-menu").toggle();
  })

  $("#userid").keyup(function(){
    var userid = $(this).val();
    console.log(userid);
    $.ajax({
      url: "../register-user/available-user.php",
      method: "POST",
      data: {user_id:userid},
      datatype: "text",
      success: function(result){
        $(".user_id>.error").html(result);
      }
    });
  });
});

