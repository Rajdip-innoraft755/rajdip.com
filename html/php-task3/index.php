<?php  
   session_start();
  if($_SESSION["active"]!=true)
  {
    header("location:../index.php");
  }
  require('../common.php');
  class Task3 extends Validate{
    public function setter($fname,$lname,$file_name,$marks_table){
      $this->fname=$fname;
      $this->lname=$lname;
      $this->target_file = $this->target_dir . basename($file_name);
      $this->imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
      $this->marksStoring($marks_table);
    }
  }
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    $obj=new Task3();
    $obj->setter($_POST["fname"],$_POST["lname"],$_FILES["image-upload"]["name"],$_POST["marks_table"]);
    $obj->isAlpha();
    $obj->imgType();
    $obj->validMarksFormat();
    if($obj->isAlpha() && $obj->imgType() && $obj->validMarksFormat()){
      $_SESSION["fullname"]="hello ! ".$obj->fname." ".$obj->lname;
      move_uploaded_file($_FILES["image-upload"]["tmp_name"], $obj->target_file);
      $_SESSION["img_path"]=$obj->target_file;
      $_SESSION["marks"]=$obj->marks;
      $_SESSION["subject"]=$obj->subject;
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
        <h1>welcome ! please fill the details to move forward .</h1>
        
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
          <div class="input-field img-upload">
            <span>CHOOSE YOUR IMAGE :</span> <input required type="file" name="image-upload" id="image-upload">
            <span class="error"><?php echo $obj->imgErr; ?></span>
          </div>
          <div class="input-field marks-table">
            <span>MARKS : <br><span class="format">* specified format :<br> subject1|xxx<br> subject2|yyy </span></span> 
            <textarea required rows=10 name="marks_table" placeholder="enter your marks"></textarea>
            <span class="error"><?php echo $obj->marksErr; ?></span>
          </div>
          
          <input class="submit" type="submit" name="submit" id="submit">
        </form>
      </div>
    </section>
  </body>
</html>

