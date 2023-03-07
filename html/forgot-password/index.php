<?php
session_start();
require_once('../vendor/autoload.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $obj = new ForgotPassword($_POST["user_id"]);
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
      <h1>welcome! please fill the details to move forward .</h1>
      <form method="POST" action="index.php" enctype="multipart/form-data">
        <div class="input-field mail">
          <span>USER ID :</span> <input required type="text" name="user_id"
            value="<?php if(isset($_POST["email"])){ $obj->user_id ;} ?>" placeholder="enter your user id">
          <span class="error">
            <?php if(isset($_POST["user_id"])){echo $obj->Err;} ?>
          </span>
        </div>
        <input class="submit" type="submit" name="submit" id="submit" value="Generate OTP">
      </form>
    </div>
  </section>
</body>

</html>