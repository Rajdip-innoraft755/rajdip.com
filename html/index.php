<?php
  require('action.php');
?>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fill details</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
    </style>
  </head>

  <body>
    <!-- details starts -->
    <section class="details">
      <!-- container starts -->
      <div class="container">
        <h1>welcome! please fill the details to move forward .</h1>
        <h2><?php echo $obj->fulpassword;?> </h2>
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
            <span>PASSWORD :</span> <input type="password" name="password" placeholder="enter password" required> 
          </div>
          <!-- input-field for password ends -->
          <input class="submit" type="submit" value="LOG IN">
        </form>
        <!-- form starts -->
      </div>
      <!-- container starts -->
    </section>
    <!-- details starts -->
  </body>
</html>

