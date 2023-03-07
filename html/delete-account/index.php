<?php
  require('action.php')
?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Account</title>
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <section class="details">
    <div class="container">
      <h1>ENTER YOUR PASSWORD TO DELETE YOUR ACCOUNT</h1>
      <form method="POST" action="index.php" enctype="multipart/form-data">
        <div class="input-field">
          <span>ENTER YOUR PASSWORD :</span> <input required type="password" class="password" name="password" value=""
            placeholder="enter new password">
          <i id="show-hide" class="fa fa-eye"></i>
          <span class="error">
            <?php if(isset($_POST["password"])){echo $obj->passErr;} ?>
          </span>
        </div>
        <input class="submit" type="submit" name="submit" id="submit" value="DELETE ACCOUNT">
        <a class="logout" href="../welcome.php">GO BACK</a>
      </form>
    </div>
  </section>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/custom.js"></script>
  <script src="https://kit.fontawesome.com/2a48c31384.js" crossorigin="anonymous"></script>
</body>

</html>