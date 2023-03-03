<?php
session_start();
require_once('../vendor/autoload.php');
unset($_SESSION["otp"]);
$obj = new ForgotPassword($_SESSION["user_id"]);
?>