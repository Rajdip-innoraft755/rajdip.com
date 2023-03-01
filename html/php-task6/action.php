<?php  
  session_start();
  if($_SESSION["active"]!=true)
  {
    header("location:../index.php");
  }
  require_once('../navbar.php');
  require('../vendor/autoload.php');
  class Task6 extends Validate{
    public function setter($fname,$lname,$file_name,$marksTable,$phn,$mail){
      $this->fname=$fname;
      $this->lname=$lname;
      $this->target_file = $this->target_dir . basename($file_name);
      $this->imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
      $this->marksStoring($marksTable);
      $this->phn=$phn;
      $this->mail=$mail;
    }
  }
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    $obj=new Task6();
    $obj->setter($_POST["fname"],$_POST["lname"],$_FILES["image-upload"]["name"],$_POST["marksTable"],$_POST["phn"],$_POST["mail"]);
    $flagAlpha=$obj->isAlpha();
    $flagImg=$obj->imgType();
    $flagMarks=$obj->validMarksFormat();
    $flagPhn=$obj->isIndPhn();
    $flagMail=$obj->vaildMail();
    if($flagAlpha && $flagImg && $flagMarks && $flagPhn && $flagMail){
      $_SESSION["fullname"]=$obj->fname." ".$obj->lname;
      move_uploaded_file($_FILES["image-upload"]["tmp_name"], $obj->target_file);
      $_SESSION["img_path"]=$obj->target_file;
      $_SESSION["marks"]=$obj->marks;
      $_SESSION["subject"]=$obj->subject;
      $_SESSION["phn"]=$obj->phn;
      $_SESSION["mail"]=$obj->mail;
      header("location:welcome.php");
    }
  } 

?>