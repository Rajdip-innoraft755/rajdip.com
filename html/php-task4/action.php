<?php  
  session_start();
  if($_SESSION["active"]!=true)
  {
    header("location:../index.php");
  }
  require('../vendor/autoload.php');
  class Task4 extends Validate{
    public function setter($fname,$lname,$file_name,$marksTable,$phn){
      $this->fname=$fname;
      $this->lname=$lname;
      $this->target_file = $this->target_dir . basename($file_name);
      $this->imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
      $this->marksStoring($marksTable);
      $this->phn=$phn;
    }
  }
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    $obj=new Task4();
    $obj->setter($_POST["fname"],$_POST["lname"],$_FILES["image-upload"]["name"],$_POST["marksTable"],$_POST["phn"]);
    $obj->isAlpha();
    $obj->imgType();
    $obj->validMarksFormat();
    $obj->isIndPhn();
    if($obj->isAlpha() && $obj->imgType()  && $obj->validMarksFormat() && $obj->isIndPhn()){
      $_SESSION["fullname"]="hello ! ".$obj->fname." ".$obj->lname;
      move_uploaded_file($_FILES["image-upload"]["tmp_name"], $obj->target_file);
      $_SESSION["img_path"]=$obj->target_file;
      $_SESSION["marks"]=$obj->marks;
      $_SESSION["subject"]=$obj->subject;
      $_SESSION["phn"]=$obj->phn;
      header("location:welcome.php");
    }
  } 
?>
