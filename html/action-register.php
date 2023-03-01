
<?php
  session_start();
  require_once('./vendor/autoload.php');
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $obj=new RegisterUser($_POST["user_id"],$_POST["email"],$_POST["password"]);
  }
?>