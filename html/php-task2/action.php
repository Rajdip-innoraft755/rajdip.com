<?php  
  session_start();
  if($_SESSION["active"]!=true)
  {
    $_SESSION["msg"]="PLEASE LOGIN TO VIEW THE TASKS.";
    header("location:../index.php");
  }
  require_once('../navbar.php');
  require_once('../vendor/autoload.php');
  class Task2 extends Validate{
    public function setter($fname,$lname,$file_name){
      $this->fname=$fname;
      $this->lname=$lname;
      $this->target_file = $this->target_dir . basename($file_name);
      $this->imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
    }
  }
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    $obj=new Task2();
    $obj->setter($_POST["fname"],$_POST["lname"],$_FILES["image-upload"]["name"]);
    $flagAlpha=$obj->isAlpha();
    $flagImg=$obj->imgType();
    if($flagAlpha && $flagImg){
      $_SESSION["fullname"]="hello ! ".$obj->fname." ".$obj->lname;
      move_uploaded_file($_FILES["image-upload"]["tmp_name"], $obj->target_file);
      $_SESSION["img_path"]=$obj->target_file;
      header("location:welcome.php");
    }
  }
?>

