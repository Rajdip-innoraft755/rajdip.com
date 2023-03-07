<?php
require('action-register.php');
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>fill details</title>
  <link rel="stylesheet" href="../css/style.css">
  
</head>

<body>
  <!-- details starts -->
  <section class="details">
    <!-- container starts -->
    <div class="container">
      <h1>welcome! please fill the details to move forward .</h1>
      <!-- form starts -->
      <form method="POST" action="register.php" enctype="multipart/form-data">
        <!-- input-field for user_id starts -->
        <div class="input-field user_id">
          <span>USER ID :</span> <input type="text" name="user_id" id="userid" placeholder="enetr user id" required>
          <span class="error"></span>
        </div>
        <!-- input-field for user_id ends -->
        <!-- input-field for email starts -->
        <div class="input-field email">
          <span>EMAIL ID :</span> <input type="text" name="email" placeholder="enetr email id" required>
          <span class="error">
            <?php if(isset($_POST["email"])){echo $obj->mailErr;} ?>
          </span>
        </div>
        <!-- input-field for email ends -->
        <!-- input-field for password starts -->
        <div class="input-field">
          <span>PASSWORD :<br>
            <span class="format">* password should contain <br> 1 uppercase <br> 1 lowercase <br> 1 special character
              <br> 1 digit <br> atleast 8 character </span>
          </span>
          <input type="password" class="password" name="password" placeholder="enter password" required>
          <i id="show-hide" class="fa fa-eye"></i>
          <span class="error">
            <?php if(isset($_POST["password"])){echo $obj->passErr;} ?>
          </span>
        </div>
        <!-- input-field for password ends -->
        <input class="submit" type="submit" value="SIGN IN">
        <a class="logout" href="../index.php">LOG IN</a>
      </form>
      <!-- form starts -->
    </div>
    <!-- container starts -->
  </section>
  <!-- details starts -->

  <script src="../js/jquery.min.js"></script>
  <script src="../js/custom.js"></script>
  <script src="https://kit.fontawesome.com/2a48c31384.js" crossorigin="anonymous"></script>
</body>

</html>