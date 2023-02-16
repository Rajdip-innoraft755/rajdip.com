<?php  
  session_start();
  if($_SESSION["active"]!=true)
  {
    header("location:../index.php");
  }
  require('../common.php');
  class Task5 extends Validate{
    public function setter($fname,$lname,$file_name,$marks_table,$phn,$mail){
      $this->fname=$fname;
      $this->lname=$lname;
      $this->target_file = $this->target_dir . basename($file_name);
      $this->imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
      $this->marksStoring($marks_table);
      $this->phn=$phn;
      $this->mail=$mail;
    }
  }
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    $obj=new Task5();
    $obj->setter($_POST["fname"],$_POST["lname"],$_FILES["image-upload"]["name"],$_POST["marks_table"],$_POST["phn"],$_POST["mail"]);
    $obj->isAlpha();
    $obj->imgType();
    $obj->validMarksFormat();
    $obj->isIndPhn();
    $obj->vaildMail();
    if($obj->isAlpha() && $obj->imgType() && $obj->validMarksFormat() && $obj->isIndPhn()  && $obj->vaildMail()){
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




<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fill details</title>
    <link rel="stylesheet" href="css/style_index.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/custom.js"></script>
    <style>
    </style>
  </head>

  <body>
    <section class="details">
      <div class="container">
        <h1>welcome! please fill the details to move forward .</h1>
        
        <form method="POST"  action="<?php echo $_SERVER["PHP-SELF"]; ?>" enctype="multipart/form-data">
          <div class="input-field fname">
            <span>FIRST NAME :</span> <input required type="text" name="fname" value="<?php echo isset($_POST['fname']) ? $obj->fname : '' ?>" placeholder="enter your first name">
            <span class="error"><?php echo $obj->fnameErr; ?></span>
            
          </div>
          <div class="input-field lname">
            <span>LAST NAME :</span> <input required type="text" name="lname" value="<?php echo isset($_POST['lname']) ? $obj->lname : '' ?>" placeholder="enter your last name">
            <span class="error"><?php echo $obj->lnameErr; ?></span>
          </div>
          <div class="input-field fullname">
            <span>FULL NAME :</span> <input type="text" name="fullname" placeholder="your full name" value="<?php echo isset($_POST['fullname']) ? ($lname." ".$lname) : '' ?>" disabled>
          </div>
          <div class="input-field image-upload">
            <span>CHOOSE YOUR IMAGE :</span> <input required type="file" name="image-upload" id="image-upload">
            <span class="error"><?php echo $obj->imgErr; ?></span>
          </div>
          <div class="input-field marks-table">
            <span>MARKS : <br><span class="format">* specified format :<br> subject1|xxx<br> subject2|yyy </span></span> 
            <textarea rrequired ows=10 name="marks_table" placeholder="enter your marks" ><?php echo isset($_POST['marks_table']) ? $obj->marks_table : '' ?></textarea>
            <span class="error"><?php echo $obj->marksErr; ?></span>
          </div>
          <div class="input-field phone">
            <span>PHONE NUMBER (Enter with your contry code) :</span> <input required type="text" name="phn" value="<?php echo isset($_POST['phn']) ? $obj->phn : '' ?>" placeholder="enter your phone number">
            <span class="error"><?php echo $obj->phnErr; ?></span>
          </div>
          <div class="input-field mail">
            <span>E-MAIL ID :</span> <input required type="text" name="mail" value="<?php echo isset($_POST['mail']) ? $obj->mail : '' ?>" placeholder="enter your email id">
            <span class="error"><?php echo $obj->mailErr; ?></span>
          </div>
          <input class="submit" type="submit" name="submit" id="submit">
        </form>
      </div>
    </section>
  </body>
</html>

