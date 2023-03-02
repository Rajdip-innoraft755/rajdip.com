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
    <style>
    </style>
  </head>

  <body>
    <!-- details starts -->
    <section class="details">
      <!-- container starts -->
      <div class="container">
        <h1>welcome! please fill the details to move forward .</h1>
        <!-- form starts -->
        <form method="POST"  action="register.php" enctype="multipart/form-data">
          <!-- input-field for user_id starts -->
          <div class="input-field user_id">
            <span>USER ID :</span> <input type="text" name="user_id" placeholder="enetr user id" required>
            <span class="error"><?php echo $obj->userErr; ?></span> 
          </div>
          <!-- input-field for user_id ends -->
          <!-- input-field for email starts -->
          <div class="input-field email">
            <span>EMAIL ID :</span> <input type="text" name="email" placeholder="enetr email id" required> 
            <span class="error"><?php echo $obj->mailErr; ?></span>
          </div>
          <!-- input-field for email ends -->
          <!-- input-field for password starts -->
          <div class="input-field password">
            <span>PASSWORD :<br>
            <span class="format">* password should contain <br> 1 uppercase <br> 1 lowercase <br> 1 special character <br> 1 digit <br> atleast 8 character </span>
            </span>
            <input type="password" name="password" placeholder="enter password" required>
            <span class="error"><?php echo $obj->passErr; ?></span> 
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
  </body>
</html>

