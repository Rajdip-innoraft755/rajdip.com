<?php
session_start();
session_unset();
session_destroy();
session_start();
$_SESSION["msg"] = "successfully logged out" .
    header('location:index.php');
?>