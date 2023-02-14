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
    public $marks=array();
    public $subject=array();
    public $subject_marks_array=array();
    public $marksErr="";
    public $phn;
    public $phnErr="";
    public $mail="";
    public $mailErr="";

    public static function marksStoring($details){
      global $subject_marks_array;
      $subject_marks_array=explode("\n",$details);
    }
    public function __construct($fname,$lname,$file_name,$marks_table,$phn,$mail){
      $this->fname=$fname;
      $this->lname=$lname;
      $this->target_file = $this->target_dir . basename($file_name);
      $this->imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
      $this->marksStoring($marks_table);
      $this->phn=$phn;
      $this->mail=$mail;
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
      if (empty($this->phn)){
        $this->phnErr="* phone number is required.";
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

    public function isIndPhn(){
      $flag=true;
      if(!str_starts_with($this->phn,"+91" )){
        $this->phnErr="* enter a valid indian phone number";
        $flag=false;
      }
      else
        $flag=$this->validPhn();
      return $flag;
    }

    public function validMarksFormat(){
      $flag=true;
      global $subject_marks_array;
      $i=0;
      // $n=count($subject_marks_array);
      foreach ($subject_marks_array as $data){
        if(!preg_match("/^[a-zA-Z]+\|[0-9]+$/",trim($data))){
          $this->marksErr="* please write marks in specified format.";
          $flag=false;
          break; 
        }
        else{
          $temp=explode("|",$data);
          $this->subject[$i]=trim($temp[0]);
          $this->marks[$i]=trim($temp[1]);
          // echo $this->marks[$i]."=>".$this->subject[$i];
          $i++;
        }
      }
      return $flag;
    }

    public function validPhn(){
      $flag=true;
      if(!preg_match("/^[0-9]{10}$/",substr($this->phn,3))){
        $this->phnErr="* enter a valid phone number.";
        $flag=false;
      }
      return $flag;
    }

    public function vaildMail(){
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=".$this->mail,
      CURLOPT_HTTPHEADER => array(
          "Content-Type: text/plain",
          "apikey: Bdj7elVVLqW7Yo54gI5GzWrceeZZDGIw"
      ),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST"
      ));
      $response = curl_exec($curl);
      $validationResult = json_decode($response, true);
      if ($validationResult['format_valid'] && $validationResult['smtp_check']) {
          $flag=true;
      } else {
          $this->mailErr = " Enter email in proper format";
          $flag=false;
      }
      curl_close($curl);
      return $flag;
    }

    public function validMailRegEx(){
      $flag=true;
      if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$this->mail)){
        $flag=false;
        $this->mailErr="* Enter email in proper format";
      }
      return $flag;
    }



  }

  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    $obj=new Validate($_POST["fname"],$_POST["lname"],$_FILES["image-upload"]["name"],$_POST["marks_table"],$_POST["phn"],$_POST["mail"]);
    $obj->isEmpty();
    $obj->isAlpha();
    $obj->imgType();
    $obj->validMarksFormat();
    $obj->isIndPhn();
    $obj->validMailRegEx();
    // $obj->vaildMail();
    if($obj->isEmpty() && $obj->isAlpha() && $obj->imgType() && $obj->validMarksFormat() && $obj->isIndPhn() && $obj->validMailRegEx()){
      $_SESSION["fullname"]="hello ! ".$obj->fname." ".$obj->lname;
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
        <h1>welcome <?php echo $obj->fname_final ." ".$obj->lname_final ?> ! please fill the details to move forward .</h1>
        
        <form method="POST"  action="<?php echo $_SERVER["PHP-SELF"]; ?>" enctype="multipart/form-data">
          <div class="input-field fname">
            <span>FIRST NAME :</span> <input type="text" name="fname" value="<?php echo isset($_POST['fname']) ? $obj->fname : '' ?>" placeholder="enter your first name">
            <span class="error"><?php echo $obj->fnameErr; ?></span>
            
          </div>
          <div class="input-field lname">
            <span>LAST NAME :</span> <input type="text" name="lname" value="<?php echo isset($_POST['lname']) ? $obj->lname : '' ?>" placeholder="enter your last name">
            <span class="error"><?php echo $obj->lnameErr; ?></span>
          </div>
          <div class="input-field fullname">
            <span>FULL NAME :</span> <input type="text" name="fullname" placeholder="your full name" value="<?php echo isset($_POST['fullname']) ? ($lname." ".$lname) : '' ?>" disabled>
          </div>
          <div class="input-field image-upload">
            <span>CHOOSE YOUR IMAGE :</span> <input type="file" name="image-upload" id="image-upload">
            <span class="error"><?php echo $obj->imgErr; ?></span>
          </div>
          <div class="input-field marks-table">
            <span>MARKS : <br><span class="format">* specified format :<br> subject1|xxx<br> subject2|yyy </span></span> 
            <textarea rows=10 name="marks_table" placeholder="enter your marks"></textarea>
            <span class="error"><?php echo $obj->marksErr; ?></span>
          </div>
          <div class="input-field phone">
            <span>PHONE NUMBER (Enter with your contry code) :</span> <input type="text" name="phn" value="<?php echo isset($_POST['phn']) ? $obj->phn : '' ?>" placeholder="enter your phone number">
            <span class="error"><?php echo $obj->phnErr; ?></span>
          </div>
          <div class="input-field mail">
            <span>E-MAIL ID :</span> <input type="text" name="mail" value="<?php echo isset($_POST['mail']) ? $obj->mail : '' ?>" placeholder="enter your email id">
            <span class="error"><?php echo $obj->mailErr; ?></span>
          </div>
          <input class="submit" type="submit" name="submit" id="submit">
        </form>
      </div>
    </section>
  </body>
</html>

