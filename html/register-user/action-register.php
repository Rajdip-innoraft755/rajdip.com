<?php
session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once('../vendor/autoload.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $obj = new RegisterUser($_POST["user_id"], $_POST["email"], $_POST["password"]);
}
?>