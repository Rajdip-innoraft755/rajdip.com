<?php  
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  $q=$_GET['q'];
  // echo $q;
  switch($q){
    case 1: 
    //   header("location:../php-task1/index-session.php");
      chdir("../html");
      echo getcwd();
      require("php-task1/index-session.php");
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
