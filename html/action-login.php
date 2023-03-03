<?php
session_start();
require_once('./vendor/autoload.php');
//check whether the request method is post or not
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $obj = new ValidateUser($_POST["user_id"], $_POST["password"]);
  $_SESSION['user'] = $_POST['user_id'];
  $_SESSION["active"] = true;
}
?>