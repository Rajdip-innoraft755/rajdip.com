<?php  
  session_start();
  class Validate{
    public $fname ="";
    public $lname="";
    public $fnameErr="";
    public $lnameErr="";
    public $imgErr="";
    public $fullname="";
    public $target_dir = "images/";
    public $target_file;
    public $imageFileType;


    public function __construct($fname,$lname,$file_name){
      $this->fname=$fname;
      $this->lname=$lname;
      $this->target_file = $this->target_dir . basename($file_name);
      $this->imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
    }

    public function isEmpty(){
      $flag=true;
      if (empty($this->fname)){ 
        $this->fnameErr="* first name is required.";
        $flag=false;
      }
      if (empty($this->lname)){
        $this->lnameErr="* last name is required.";
        $flag=false;
      } 
      return $flag;
    }


    public function isAlpha(){
      $flag=true;
      if(!preg_match("/^[a-zA-Z ]*$/",$this->fname)){
        $this->fnameErr = "* Only alphabets and white space are allowed";
        $flag=false;
      }
      if (!preg_match("/^[a-zA-Z ]*$/",$this->lname)) {  
        $this->lnameErr = "* Only alphabets and white space are allowed"; 
        $flag=false;
      }
      return $flag;
    }

    public function imgType(){
      $flag=true;
      if($this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg" && $this->imageFileType != "gif" ) {
        $this->imgErr="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $flag=false;
      }
      return $flag;
    }

  }

  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    $obj=new Validate($_POST["fname"],$_POST["lname"],$_FILES["image-upload"]["name"]);
    $obj->isEmpty();
    $obj->isAlpha();
    $obj->imgType();
    if($obj->isEmpty() && $obj->isAlpha() && $obj->imgType()){
      $_SESSION["fullname"]="hello ! ".$obj->fname." ".$obj->lname;
      move_uploaded_file($_FILES["image-upload"]["tmp_name"], $obj->target_file);
      $_SESSION["img_path"]=$obj->target_file;
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
        <h1>welcome <?php echo $obj->fname_final ." ".$obj->lname_final ?> ! please fill the details to move forward .</h1>
        
        <form method="POST"  action="<?php echo $_SERVER["PHP-SELF"]; ?>" enctype="multipart/form-data">
          <div class="input-field fname">
            <span>FIRST NAME :</span> <input id="target" type="text" name="fname" value="<?php echo isset($_POST['fname']) ? $obj->fname : '' ?>" placeholder="enter your first name">
            <span class="error"><?php echo $obj->fnameErr; ?></span>
            
          </div>
          <div class="input-field lname">
            <span>LAST NAME :</span> <input type="text" name="lname" value="<?php echo isset($_POST['lname']) ? $obj->lname : '' ?>" placeholder="enter your last name">
            <span class="error"><?php echo $obj->lnameErr; ?></span>
          </div>
          <div class="input-field fullname">
            <span>FULL NAME :</span> <input type="text" name="fullname" placeholder="your full name" value="<?php echo isset($_POST['fullname']) ? ($lname." ".$lname) : '' ?>" disabled>
          </div>
          <div class="input-field fullname">
            <span>CHOOSE YOUR IMAGE :</span> <input type="file" name="image-upload" id="image-upload">
            <span class="error"><?php echo $obj->imgErr; ?></span>
          </div>
          
          <input class="submit" type="submit" name="submit" id="submit">
        </form>
      </div>
    </section>
  </body>
</html>

