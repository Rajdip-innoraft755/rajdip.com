<?php
  session_start();
  require('welcome-action.php');
  if(!$_SESSION['active'] == TRUE) {
    header('location: index.php');
  }
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
            <!-- <span>basic task NUMBER :</span> <input type="text" name="q" placeholder="enetr basic task number" >  -->
            <select id="select-box" name="q">
              <option class="option" value="1">basic task 1</option>
              <option class="option" value="2">basic task 2</option>
              <option class="option" value="3">basic task 3</option>
              <option class="option" value="4">basic task 4</option>
              <option class="option" value="5">basic task 5</option>
              <option class="option" value="6">basic task 6</option>
              <option class="option" value="7">advance task 1</option>
              <option class="option" value="8">advance task 2</option>
            </select>
          </div>
          <input class="submit" type="submit" value="SEARCH">
          <a class="logout" href="logout.php">LOG OUT</a>
        </form>
      </div>
    </div>
  </section>
</body>
  <script src="js/jquery.min.js"></script>
  <script src="js/custom.js"></script>
</html>