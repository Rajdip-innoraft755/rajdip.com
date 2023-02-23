<?php
  require('welcome-action.php');
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome user</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <section class="details">
    <div class="container">
      <div class="name">
        <h1>WELCOME USER</h1>
        <form action="welcome.php" method="GET">
          <div class="input-field user_id">
            <span>QUESTION NUMBER :</span> <input type="text" name="q" placeholder="enetr question number" required> 
          </div>
          <input class="submit" type="submit" value="SEARCH">
          <a class="logout" href="logout.php">LOG OUT</a>
        </form>
      </div>
    </div>
  </section>
</body>
</html>