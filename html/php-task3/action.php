<?php
session_start();
if ($_SESSION["active"] != true) {
  $_SESSION["msg"] = "PLEASE LOGIN TO VIEW THE TASKS.";
  header("location:../index.php");
}
require_once('../navbar.php');
require('../vendor/autoload.php');
class Task3 extends Validate
{
  public function setter($fname, $lname, $file_name, $marksTable)
  {
    $this->fname = $fname;
    $this->lname = $lname;
    $this->target_file = $this->target_dir . basename($file_name);
    $this->imageFileType = strtolower(pathinfo($this->target_file, PATHINFO_EXTENSION));
    $this->marksStoring($marksTable);
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $obj = new Task3();
  $obj->setter($_POST["fname"], $_POST["lname"], $_FILES["image-upload"]["name"], $_POST["marksTable"]);
  $flagAlpha = $obj->isAlpha();
  $flagImg = $obj->imgType();
  $flagMarks = $obj->validMarksFormat();
  if ($flagAlpha && $flagImg && $flagMarks) {
    $_SESSION["fullname"] = "hello ! " . $obj->fname . " " . $obj->lname;
    move_uploaded_file($_FILES["image-upload"]["tmp_name"], $obj->target_file);
    $_SESSION["img_path"] = $obj->target_file;
    $_SESSION["marks"] = $obj->marks;
    $_SESSION["subject"] = $obj->subject;
    header("location:welcome.php");
  }
}
?>