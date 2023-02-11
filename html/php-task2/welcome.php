<?php  
  session_start();
  // echo $_SESSION["fullname"];
  $img_path=$_SESSION["img_path"];
  // echo "<img src='$img_path' style='width:200px;height:100px'>";
?>



<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome user</title>
  <link rel="stylesheet" href="style_welcome.css">
</head>
<body>
  <section class="details-shown">
    <div class="container">
      <div class="image">
        <?php echo "<img src='$img_path' style='width:200px;height:100px'>"; ?>
      </div>
      <div class="name">
        <?php echo $_SESSION["fullname"]; ?>
      </div>
    </div>
  </section>
</body>
</html>