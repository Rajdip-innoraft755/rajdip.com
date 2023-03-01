<?php
  require('class.php');
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    $obj=new ResetPassword($_POST["password"]);
  }
?>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fill details</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/style_navbar.css">
    <style>
    </style>
  </head>

  <body>
    <section class="details">
      <div class="container">
        <h1>ENTER YOUR NEW PASSWORD</h1>        
        <form method="POST"  action="reset.php" enctype="multipart/form-data">
          <div class="input-field password">
            <span>NEW PASSWORD :</span> <input required type="password" name="password" value="" placeholder="enter new password">
            <span class="error"><?php echo $obj->Err; ?></span>            
          </div>
          <input class="submit" type="submit" name="submit" id="submit" value="RESET PASSWORD">
        </form>
      </div>
    </section>
  </body>
</html>