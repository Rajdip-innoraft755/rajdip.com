<?php  
  session_start();
?>



<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome user</title>
  <link rel="stylesheet" href="css/style_welcome.css">
</head>
<body>
  <section class="details-shown">
    <div class="container">
      <div class="name">
        <h1><?php echo $_SESSION["fullname"]; ?></h1>
      </div>
    </div>
  </section>
</body>
</html>