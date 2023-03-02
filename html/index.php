<?php
  require('action-login.php');
?>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fill details</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://kit.fontawesome.com/2a48c31384.js" crossorigin="anonymous"></script>
  </head>

  <body>
    <!-- details starts -->
    <section class="details">
      <!-- container starts -->
      <div class="container">
        <h1>welcome! please fill the details to move forward .</h1>
        <h3><?php echo $_SESSION["msg"]; unset($_SESSION["msg"]) ; ?></h3>
        <!-- form starts -->
        <form method="POST"  action="index.php" enctype="multipart/form-data">
          <span class="error"><?php echo $obj->Err; ?></span>
          <!-- input-field for user_id starts -->
          <div class="input-field user_id">
            <span>USER ID :</span> <input type="text" name="user_id" placeholder="enetr user id" required> 
          </div>
          <!-- input-field for user_id ends -->
          <!-- input-field for password starts -->
          <div class="input-field password">
            <span>PASSWORD :</span> <input type="password" class="password" name="password" placeholder="enter password" required> 
            <i id="show-hide" class="fa fa-eye"></i> 
            
            
          </div>
          <div class="forgot-password"><a href="forgot-password/">Forgot Password ?</a></div>
          <!-- input-field for password ends -->
          <a href=""></a>
          <input class="submit" type="submit" name="submit" value="LOG IN">
          <div class="new-account">
            Don't Have an Account ? <a href="../register-user/register.php">click Here</a>
          </div>
        </form>
        <!-- form starts -->
      </div>
      <!-- container starts -->
    </section>
    <!-- details starts -->
  </body>
</html>

