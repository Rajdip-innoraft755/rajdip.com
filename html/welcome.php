<?php  
  session_start();
  $q=$_GET['q'];
  // echo $q;
  switch($q){
    case 1: 
      header("location:../php-task1/index-session.php");
      break;
    case 2:
      header("location:../php-task2");
      break;
    case 3:
      header("location:../php-task3");
      break;
    case 4:
      header("location:../php-task4");
      break;
    case 5:
      header("location:../php-task5");
      break;
    case 6:
      header("location:../php-task6");
      break;
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