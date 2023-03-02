<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="css/style_navbar.css">
</head>
<body>
  <!-- navbar starts -->
  <section class="navbar">
    <!-- container starts -->
    <div class="container">
      <!-- navwrap starts -->
      <div class="navwrap">
        <!-- menubar starts -->
        <div class="menubar">
          <ul>
            <li>
              <a href="../php-task1/index-session.php"> TASK 1</a>
            </li>
            <li>
              <a href="../php-task2/">TASK 2</a>
            </li>
            <li>
              <a href="../php-task3/">TASK 3</a>
            </li>
            <li>
              <a href="../php-task4/">TASK 4</a>
            </li>
            <li>
              <a href="../php-task5/">TASK 5</a>
            </li>
            <li>
              <a href="../php-task6/">TASK 6</a>
            </li>
            <li>
              <a href="../php-advance-1/">ADVANCE TASK 1</a>
            </li>
            <li>
              <a href="../php-advance-2/">ADVANCE TASK 2</a>
            </li>
          </ul>
        </div>
        <!-- menubar ends -->
        <!-- account starts -->
        <div class="account">
          <a href="../welcome.php"><h3>WELCOME<?php session_start(); echo " ".strtoupper($_SESSION['user']) ;?></h3></a>
          <ul>
            <li>
              <a class="logout" href="../logout.php">LOGOUT</a>
            </li>
          </ul>
        </div>
        <!-- account ends -->
      </div>  
      <!-- navwrap ends -->
    </div>
    <!-- container ends -->
  </section>
  <!-- navbar starts -->
</body>
</html>