<?php
session_start();
if (!$_SESSION['active'] == TRUE) {
  $_SESSION["msg"] = "PLEASE LOGIN TO VIEW THE TASKS.";
  header('location: ../index.php');
}
require_once('./class.php');
$obj = new AdvanceTask1();
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP ADVANCE TASK 1</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <div class="container">
    <?php
    for ($i = 0; $i < $obj->dataLength; $i++) {
      if ($obj->getData($i)) {
        ?>
        <div class="wrapper">
          <div class="left">
            <div class="image-box">
              <?php echo "<img src=" . $obj->img . ">"; ?>
            </div>
          </div>
          <div class=right>
            <div class="header">
              <a href="#">
                <h2>
                  <?php echo $obj->title; ?>
                </h2>
              </a>
            </div>
            <div class="text-box">
              <?php echo $obj->content; ?>
            </div>
            <div class="btn">
              <a href=<?php echo $obj->link ?>>Explore Now</a>
            </div>
          </div>
        </div>
      <?php
      }
    }
    ?>
  </div>

</body>

</html>