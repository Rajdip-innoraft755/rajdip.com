<?php
session_start();
if ($_SESSION["active"] != true) {
  $_SESSION["msg"] = "PLEASE LOGIN TO DELETE ACCOUNT.";
  header("location : ../index.php");
}
require_once('../vendor/autoload.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $obj = new DeleteAccount($_POST["password"]);
}
?>