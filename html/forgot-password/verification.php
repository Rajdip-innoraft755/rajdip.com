<?php
  session_start();
  require_once('../vendor/autoload.php');
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    $obj=new ValidateOtp($_POST["otp"]);
  }
?>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fill details</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_navbar.css">
    <style>
    </style>
  </head>

  <body>
    <section class="details">
      <div class="container">
        <h1>ENTER THE OTP SENT IN YOUR REGISTERED EMAIL-ID</h1>        
        <form method="POST"  action="verification.php" enctype="multipart/form-data">
          <div class="input-field mail">
            <span>OTP :</span> <input required type="text" name="otp" value="<?php echo isset($_POST['otp']) ? $_POST['otp'] : '' ?>" placeholder="enter otp">
            <span class="error"><?php echo $obj->Err; ?></span>            
          </div>
          <input class="submit" type="submit" name="submit" id="submit" value="VALIDATE OTP">
          <a class="resend" href="resend.php">RESEND OTP</a>
        </form>
      </div>
    </section>
  </body>
</html>